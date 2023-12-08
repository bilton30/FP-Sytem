<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcustomer_temp_readingRequest;
use App\Http\Requests\Updatecustomer_temp_readingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\customer_temp_readingRepository;
use Illuminate\Http\Request;
use Flash;

class customer_temp_readingController extends AppBaseController
{
    /** @var customer_temp_readingRepository $customerTempReadingRepository*/
    private $customerTempReadingRepository;

    public function __construct(customer_temp_readingRepository $customerTempReadingRepo)
    {
        $this->customerTempReadingRepository = $customerTempReadingRepo;
    }

    /**
     * Display a listing of the customer_temp_reading.
     */
    public function index(Request $request)
    {
        $customerTempReadings = $this->customerTempReadingRepository->paginate(10);

        return view('customer_temp_readings.index')
            ->with('customerTempReadings', $customerTempReadings);
    }

    /**
     * Show the form for creating a new customer_temp_reading.
     */
    public function create()
    {
        return view('customer_temp_readings.create');
    }

    /**
     * Store a newly created customer_temp_reading in storage.
     */
    public function store(Createcustomer_temp_readingRequest $request)
    {
        $input = $request->all();

        $customerTempReading = $this->customerTempReadingRepository->create($input);

        Flash::success('Customer Temp Reading saved successfully.');

        return redirect(route('customerTempReadings.index'));
    }

    /**
     * Display the specified customer_temp_reading.
     */
    public function show($id)
    {
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            Flash::error('Customer Temp Reading not found');

            return redirect(route('customerTempReadings.index'));
        }

        return view('customer_temp_readings.show')->with('customerTempReading', $customerTempReading);
    }

    /**
     * Show the form for editing the specified customer_temp_reading.
     */
    public function edit($id)
    {
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            Flash::error('Customer Temp Reading not found');

            return redirect(route('customerTempReadings.index'));
        }

        return view('customer_temp_readings.edit')->with('customerTempReading', $customerTempReading);
    }

    /**
     * Update the specified customer_temp_reading in storage.
     */
    public function update($id, Updatecustomer_temp_readingRequest $request)
    {
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            Flash::error('Customer Temp Reading not found');

            return redirect(route('customerTempReadings.index'));
        }

        $customerTempReading = $this->customerTempReadingRepository->update($request->all(), $id);

        Flash::success('Customer Temp Reading updated successfully.');

        return redirect(route('customerTempReadings.index'));
    }

    /**
     * Remove the specified customer_temp_reading from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customerTempReading = $this->customerTempReadingRepository->find($id);

        if (empty($customerTempReading)) {
            Flash::error('Customer Temp Reading not found');

            return redirect(route('customerTempReadings.index'));
        }

        $this->customerTempReadingRepository->delete($id);

        Flash::success('Customer Temp Reading deleted successfully.');

        return redirect(route('customerTempReadings.index'));
    }
}
