<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createpayment_typeAPIRequest;
use App\Http\Requests\API\Updatepayment_typeAPIRequest;
use App\Models\payment_type;
use App\Repositories\payment_typeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class payment_typeAPIController
 */
class payment_typeAPIController extends AppBaseController
{
    private payment_typeRepository $paymentTypeRepository;

    public function __construct(payment_typeRepository $paymentTypeRepo)
    {
        $this->paymentTypeRepository = $paymentTypeRepo;
    }

    /**
     * Display a listing of the payment_types.
     * GET|HEAD /payment_types
     */
    public function index(Request $request): JsonResponse
    {
        $paymentTypes = $this->paymentTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($paymentTypes->toArray(), 'Payment Types retrieved successfully');
    }

    /**
     * Store a newly created payment_type in storage.
     * POST /payment_types
     */
    public function store(Createpayment_typeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $paymentType = $this->paymentTypeRepository->creatOrUdate($input);

        return $this->sendResponse($paymentType->toArray(), 'Payment Type saved successfully');
    }

    /**
     * Display the specified payment_type.
     * GET|HEAD /payment_types/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var payment_type $paymentType */
        $paymentType = $this->paymentTypeRepository->find($id);

        if (empty($paymentType)) {
            return $this->sendError('Payment Type not found');
        }

        return $this->sendResponse($paymentType->toArray(), 'Payment Type retrieved successfully');
    }

    /**
     * Update the specified payment_type in storage.
     * PUT/PATCH /payment_types/{id}
     */
    public function update($id, Updatepayment_typeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var payment_type $paymentType */
        $paymentType = $this->paymentTypeRepository->find($id);

        if (empty($paymentType)) {
            return $this->sendError('Payment Type not found');
        }

        $paymentType = $this->paymentTypeRepository->update($input, $id);

        return $this->sendResponse($paymentType->toArray(), 'payment_type updated successfully');
    }

    /**
     * Remove the specified payment_type from storage.
     * DELETE /payment_types/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var payment_type $paymentType */
        $paymentType = $this->paymentTypeRepository->find($id);

        if (empty($paymentType)) {
            return $this->sendError('Payment Type not found');
        }

        $paymentType->delete();

        return $this->sendSuccess('Payment Type deleted successfully');
    }
}
