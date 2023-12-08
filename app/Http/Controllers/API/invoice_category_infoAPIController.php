<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinvoice_category_infoAPIRequest;
use App\Http\Requests\API\Updateinvoice_category_infoAPIRequest;
use App\Models\invoice_category_info;
use App\Repositories\invoice_category_infoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class invoice_category_infoAPIController
 */
class invoice_category_infoAPIController extends AppBaseController
{
    private invoice_category_infoRepository $invoiceCategoryInfoRepository;

    public function __construct(invoice_category_infoRepository $invoiceCategoryInfoRepo)
    {
        $this->invoiceCategoryInfoRepository = $invoiceCategoryInfoRepo;
    }

    /**
     * Display a listing of the invoice_category_infos.
     * GET|HEAD /invoice_category_infos
     */
    public function index(Request $request): JsonResponse
    {
        $invoiceCategoryInfos = $this->invoiceCategoryInfoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($invoiceCategoryInfos->toArray(), 'Invoice Category Infos retrieved successfully');
    }

    /**
     * Store a newly created invoice_category_info in storage.
     * POST /invoice_category_infos
     */
    public function store(Createinvoice_category_infoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->creatOrUdate($input);

        return $this->sendResponse($invoiceCategoryInfo->toArray(), 'Invoice Category Info saved successfully');
    }

    /**
     * Display the specified invoice_category_info.
     * GET|HEAD /invoice_category_infos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var invoice_category_info $invoiceCategoryInfo */
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            return $this->sendError('Invoice Category Info not found');
        }

        return $this->sendResponse($invoiceCategoryInfo->toArray(), 'Invoice Category Info retrieved successfully');
    }

    /**
     * Update the specified invoice_category_info in storage.
     * PUT/PATCH /invoice_category_infos/{id}
     */
    public function update($id, Updateinvoice_category_infoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var invoice_category_info $invoiceCategoryInfo */
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            return $this->sendError('Invoice Category Info not found');
        }

        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->update($input, $id);

        return $this->sendResponse($invoiceCategoryInfo->toArray(), 'invoice_category_info updated successfully');
    }

    /**
     * Remove the specified invoice_category_info from storage.
     * DELETE /invoice_category_infos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var invoice_category_info $invoiceCategoryInfo */
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            return $this->sendError('Invoice Category Info not found');
        }

        $invoiceCategoryInfo->delete();

        return $this->sendSuccess('Invoice Category Info deleted successfully');
    }
}
