<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetaxAPIRequest;
use App\Http\Requests\API\UpdatetaxAPIRequest;
use App\Models\tax;
use App\Repositories\taxRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class taxAPIController
 */
class taxAPIController extends AppBaseController
{
    private taxRepository $taxRepository;

    public function __construct(taxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    /**
     * Display a listing of the taxes.
     * GET|HEAD /taxes
     */
    public function index(Request $request): JsonResponse
    {
        $taxes = $this->taxRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($taxes->toArray(), 'Taxes retrieved successfully');
    }

    /**
     * Store a newly created tax in storage.
     * POST /taxes
     */
    public function store(CreatetaxAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $tax = tax::where('id', $input['id'])->orWhere('code', $input['code'])->first();
                
        if(!$tax){

            $tax = $this->taxRepository->creatOrUdate($input);

        }else{

            $tax = $this->taxRepository->update($input,$tax->id);

        }             

        return $this->sendResponse($tax->toArray(), 'Tax saved successfully');
    }

    /**
     * Display the specified tax.
     * GET|HEAD /taxes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var tax $tax */
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        return $this->sendResponse($tax->toArray(), 'Tax retrieved successfully');
    }

    /**
     * Update the specified tax in storage.
     * PUT/PATCH /taxes/{id}
     */
    public function update($id, UpdatetaxAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var tax $tax */
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        $tax = $this->taxRepository->update($input, $id);

        return $this->sendResponse($tax->toArray(), 'tax updated successfully');
    }

    /**
     * Remove the specified tax from storage.
     * DELETE /taxes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var tax $tax */
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        $tax->delete();

        return $this->sendSuccess('Tax deleted successfully');
    }
}
