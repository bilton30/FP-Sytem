<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinvoice_infoAPIRequest;
use App\Http\Requests\API\Updateinvoice_infoAPIRequest;
use App\Models\invoice_info;
use App\Repositories\invoice_infoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class invoice_infoAPIController
 */
class invoice_infoAPIController extends AppBaseController
{
    private invoice_infoRepository $invoiceInfoRepository;

    public function __construct(invoice_infoRepository $invoiceInfoRepo)
    {
        $this->invoiceInfoRepository = $invoiceInfoRepo;
    }

    /**
     * Display a listing of the invoice_infos.
     * GET|HEAD /invoice_infos
     */
    public function index(Request $request): JsonResponse
    {
        $invoiceInfos = $this->invoiceInfoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($invoiceInfos->toArray(), 'Invoice Infos retrieved successfully');
    }

    /**
     * Store a newly created invoice_info in storage.
     * POST /invoice_infos
     */
    public function store(Createinvoice_infoAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        
        $input['id'] = $input['uid'];

        $invoiceInfo = $this->invoiceInfoRepository->creatOrUdate($input);

        return $this->sendResponse($invoiceInfo->toArray(), 'Invoice Info saved successfully');
    }

    /**
     * Display the specified invoice_info.
     * GET|HEAD /invoice_infos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var invoice_info $invoiceInfo */
        $invoiceInfo = $this->invoiceInfoRepository->find($id);

        if (empty($invoiceInfo)) {
            return $this->sendError('Invoice Info not found');
        }

        return $this->sendResponse($invoiceInfo->toArray(), 'Invoice Info retrieved successfully');
    }

    /**
     * Update the specified invoice_info in storage.
     * PUT/PATCH /invoice_infos/{id}
     */
    public function update($id, Updateinvoice_infoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var invoice_info $invoiceInfo */
        $invoiceInfo = $this->invoiceInfoRepository->find($id);

        if (empty($invoiceInfo)) {
            return $this->sendError('Invoice Info not found');
        }

        $invoiceInfo = $this->invoiceInfoRepository->update($input, $id);

        return $this->sendResponse($invoiceInfo->toArray(), 'invoice_info updated successfully');
    }

    /**
     * Remove the specified invoice_info from storage.
     * DELETE /invoice_infos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var invoice_info $invoiceInfo */
        $invoiceInfo = $this->invoiceInfoRepository->find($id);

        if (empty($invoiceInfo)) {
            return $this->sendError('Invoice Info not found');
        }

        $invoiceInfo->delete();

        return $this->sendSuccess('Invoice Info deleted successfully');
    }
}
