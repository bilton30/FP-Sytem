<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtariff_scaleAPIRequest;
use App\Http\Requests\API\Updatetariff_scaleAPIRequest;
use App\Models\tariff_scale;
use App\Repositories\tariff_scaleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class tariff_scaleAPIController
 */
class tariff_scaleAPIController extends AppBaseController
{
    private tariff_scaleRepository $tariffScaleRepository;

    public function __construct(tariff_scaleRepository $tariffScaleRepo)
    {
        $this->tariffScaleRepository = $tariffScaleRepo;
    }

    /**
     * Display a listing of the tariff_scales.
     * GET|HEAD /tariff_scales
     */
    public function index(Request $request): JsonResponse
    {
        $tariffScales = $this->tariffScaleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tariffScales->toArray(), 'Tariff Scales retrieved successfully');
    }

    /**
     * Store a newly created tariff_scale in storage.
     * POST /tariff_scales
     */
    public function store(Createtariff_scaleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $tariffScale = $this->tariffScaleRepository->creatOrUdate($input);

        return $this->sendResponse($tariffScale->toArray(), 'Tariff Scale saved successfully');
    }

    /**
     * Display the specified tariff_scale.
     * GET|HEAD /tariff_scales/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var tariff_scale $tariffScale */
        $tariffScale = $this->tariffScaleRepository->find($id);

        if (empty($tariffScale)) {
            return $this->sendError('Tariff Scale not found');
        }

        return $this->sendResponse($tariffScale->toArray(), 'Tariff Scale retrieved successfully');
    }

    /**
     * Update the specified tariff_scale in storage.
     * PUT/PATCH /tariff_scales/{id}
     */
    public function update($id, Updatetariff_scaleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var tariff_scale $tariffScale */
        $tariffScale = $this->tariffScaleRepository->find($id);

        if (empty($tariffScale)) {
            return $this->sendError('Tariff Scale not found');
        }

        $tariffScale = $this->tariffScaleRepository->update($input, $id);

        return $this->sendResponse($tariffScale->toArray(), 'tariff_scale updated successfully');
    }

    /**
     * Remove the specified tariff_scale from storage.
     * DELETE /tariff_scales/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var tariff_scale $tariffScale */
        $tariffScale = $this->tariffScaleRepository->find($id);

        if (empty($tariffScale)) {
            return $this->sendError('Tariff Scale not found');
        }

        $tariffScale->delete();

        return $this->sendSuccess('Tariff Scale deleted successfully');
    }
}
