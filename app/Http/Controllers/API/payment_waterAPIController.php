<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createpayment_waterAPIRequest;
use App\Http\Requests\API\Updatepayment_waterAPIRequest;
use App\Models\payment_water;
use App\Repositories\payment_waterRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class payment_waterAPIController
 */
class payment_waterAPIController extends AppBaseController
{
    private payment_waterRepository $paymentWaterRepository;

    public function __construct(payment_waterRepository $paymentWaterRepo)
    {
        $this->paymentWaterRepository = $paymentWaterRepo;
    }

    /**
     * Display a listing of the payment_waters.
     * GET|HEAD /payment_waters
     */
    public function index(Request $request): JsonResponse
    {
        $paymentWaters = $this->paymentWaterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($paymentWaters->toArray(), 'Payment Waters retrieved successfully');
    }

    /**
     * Store a newly created payment_water in storage.
     * POST /payment_waters
     */
    public function store(Createpayment_waterAPIRequest $request): JsonResponse
    {
        try {

            DB::beginTransaction();

            $paymentWater = $this->paymentWaterRepository->creatOrUdate($input);

            if (empty($paymentWater)) {
                return $this->sendError('Can not create payment');
            }

            $input['payment_water_uid'] =  $paymentWater->id;
            
            $payment = $this->paymentRepository->creatOrUdate($input);
            DB::commit();
            return $this->sendResponse(["paymentWater"=> $paymentWater->toArray(),'payment'=>$payment->toArray()], 'Payment Water saved successfully');
          
            
       
    } catch (\Exception $ex) {
        //throw $th;
        DB::rollBack();
        return $this->sendResponse([], 'Error can not create ');

        
    }
    }

    /**
     * Display the specified payment_water.
     * GET|HEAD /payment_waters/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var payment_water $paymentWater */
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            return $this->sendError('Payment Water not found');
        }

        return $this->sendResponse($paymentWater->toArray(), 'Payment Water retrieved successfully');
    }

    /**
     * Update the specified payment_water in storage.
     * PUT/PATCH /payment_waters/{id}
     */
    public function update($id, Updatepayment_waterAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var payment_water $paymentWater */
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            return $this->sendError('Payment Water not found');
        }

        $paymentWater = $this->paymentWaterRepository->update($input, $id);

        return $this->sendResponse($paymentWater->toArray(), 'payment_water updated successfully');
    }

    /**
     * Remove the specified payment_water from storage.
     * DELETE /payment_waters/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var payment_water $paymentWater */
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            return $this->sendError('Payment Water not found');
        }

        $paymentWater->delete();

        return $this->sendSuccess('Payment Water deleted successfully');
    }
}
