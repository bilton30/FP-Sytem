<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcustomer_temp_readingAPIRequest;
use App\Http\Requests\API\Updatecustomer_temp_readingAPIRequest;
use App\Models\customer_temp_reading;
use App\Repositories\customer_temp_readingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class customer_temp_readingAPIController
 */
class customer_temp_readingAPIController extends AppBaseController
{
    private customer_temp_readingRepository $customerTempReadingRepository;

    public function __construct(customer_temp_readingRepository $customerTempReadingRepo)
    {
        $this->customerTempReadingRepository = $customerTempReadingRepo;
    }

    /**
     * Display a listing of the customer_temp_readings.
     * GET|HEAD /customer_temp_readings
     */
    public function index(Request $request): JsonResponse
    {
        $customerTempReadings = $this->customerTempReadingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customerTempReadings->toArray(), 'Customer Temp Readings retrieved successfully');
    }

    /**
     * Store a newly created customer_temp_reading in storage.
     * POST /customer_temp_readings
     */
    public function store(Createcustomer_temp_readingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

         $input['id'] = $input['uid'];

        $customerTempReading = $this->customerTempReadingRepository->creatOrUdate($input);

        return $this->sendResponse($customerTempReading->toArray(), 'Customer Temp Reading saved successfully');
    }

    /**
     * Display the specified customer_temp_reading.
     * GET|HEAD /customer_temp_readings/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var customer_temp_reading $customerTempReading */
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            return $this->sendError('Customer Temp Reading not found');
        }

        return $this->sendResponse($customerTempReading->toArray(), 'Customer Temp Reading retrieved successfully');
    }

    /**
     * Update the specified customer_temp_reading in storage.
     * PUT/PATCH /customer_temp_readings/{id}
     */
    public function update($id, Updatecustomer_temp_readingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var customer_temp_reading $customerTempReading */
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            return $this->sendError('Customer Temp Reading not found');
        }

        $customerTempReading = $this->customerTempReadingRepository->update($input, $id);

        return $this->sendResponse($customerTempReading->toArray(), 'customer_temp_reading updated successfully');
    }

    /**
     * Remove the specified customer_temp_reading from storage.
     * DELETE /customer_temp_readings/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var customer_temp_reading $customerTempReading */
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            return $this->sendError('Customer Temp Reading not found');
        }

        $customerTempReading->delete();

        return $this->sendSuccess('Customer Temp Reading deleted successfully');
    }
}
