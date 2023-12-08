<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetariffAPIRequest;
use App\Http\Requests\API\UpdatetariffAPIRequest;
use App\Models\tariff;
use App\Repositories\tariffRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class tariffAPIController
 */
class tariffAPIController extends AppBaseController
{
    private tariffRepository $tariffRepository;

    public function __construct(tariffRepository $tariffRepo)
    {
        $this->tariffRepository = $tariffRepo;
    }

    /**
     * Display a listing of the tariffs.
     * GET|HEAD /tariffs
     */
    public function index(Request $request): JsonResponse
    {
        $tariffs = $this->tariffRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tariffs->toArray(), 'Tariffs retrieved successfully');
    }

    /**
     * Store a newly created tariff in storage.
     * POST /tariffs
     */
    public function store(CreatetariffAPIRequest $request): JsonResponse
    {
        try {
           
            $input = $request->all();

            if (isset($input['uid'])) {

                $input['id'] = $input['uid'];

            } else {

                return $this->sendError('the uid field is required');
                
            }

            $tariff = $this->tariffRepository->creatOrUdate($input);

            return $this->sendResponse($tariff->toArray(), 'Tariff saved successfully');
        } catch (\Exception $th) {
            //throw $th;
            return $this->sendError('Can not create tariff, please contact your syetem admin ');
        }
    }

    /**
     * Display the specified tariff.
     * GET|HEAD /tariffs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var tariff $tariff */
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        return $this->sendResponse($tariff->toArray(), 'Tariff retrieved successfully');
    }

    /**
     * Update the specified tariff in storage.
     * PUT/PATCH /tariffs/{id}
     */
    public function update($id, UpdatetariffAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var tariff $tariff */
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        $tariff = $this->tariffRepository->update($input, $id);

        return $this->sendResponse($tariff->toArray(), 'tariff updated successfully');
    }

    /**
     * Remove the specified tariff from storage.
     * DELETE /tariffs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var tariff $tariff */
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        $tariff->delete();

        return $this->sendSuccess('Tariff deleted successfully');
    }
}
