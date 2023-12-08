<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepaymentAPIRequest;
use App\Http\Requests\API\UpdatepaymentAPIRequest;
use App\Models\payment;
use App\Repositories\paymentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class paymentAPIController
 */
class paymentAPIController extends AppBaseController
{
    private paymentRepository $paymentRepository;

    public function __construct(paymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the payments.
     * GET|HEAD /payments
     */
    public function index(Request $request): JsonResponse
    {
        $payments = $this->paymentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($payments->toArray(), 'Payments retrieved successfully');
    }

    /**
     * Store a newly created payment in storage.
     * POST /payments
     */
    public function store(CreatepaymentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $payment = $this->paymentRepository->creatOrUdate($input);

        return $this->sendResponse($payment->toArray(), 'Payment saved successfully');
    }

    /**
     * Display the specified payment.
     * GET|HEAD /payments/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        return $this->sendResponse($payment->toArray(), 'Payment retrieved successfully');
    }

    /**
     * Update the specified payment in storage.
     * PUT/PATCH /payments/{id}
     */
    public function update($id, UpdatepaymentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        $payment = $this->paymentRepository->update($input, $id);

        return $this->sendResponse($payment->toArray(), 'payment updated successfully');
    }

    /**
     * Remove the specified payment from storage.
     * DELETE /payments/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        $payment->delete();

        return $this->sendSuccess('Payment deleted successfully');
    }
}
