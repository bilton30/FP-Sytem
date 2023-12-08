<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecustomerAPIRequest;
use App\Http\Requests\API\UpdatecustomerAPIRequest;
use App\Models\customer;
use App\Repositories\customerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class customerAPIController
 */
class customerAPIController extends AppBaseController
{
    private customerRepository $customerRepository;

    public function __construct(customerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the customers.
     * GET|HEAD /customers
     */
    public function index(Request $request): JsonResponse
    {
        $customers = $this->customerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');
    }

    /**
     * Store a newly created customer in storage.
     * POST /customers
     */
    public function store(CreatecustomerAPIRequest $request) 
    {
        try {
                
                $input = $request->all();

                $input['id'] = $input['uid'];
                
                if (isset($input['uid'])) {

                    $input['id'] = $input['uid'];

                    $customer = customer::where('id', $input['id'])->orWhere('nuit', $input['nuit'])->first();
                        
                    if(!$customer){

                        $customer = $this->customerRepository->creatOrUdate($input);

                    }else{

                        $customer = $this->customerRepository->update($input, $customer->id);

                    }             

                        return $this->sendResponse($customer, 'Customer saved successfully');

                } else {

                    return $this->sendError('the uid field is required');
                    
                }

            } catch (\Exception $th) {
                return $this->sendError('Can not create Customer, please contact the system admin');

            }

    }

    /**
     * Display the specified customer.
     * GET|HEAD /customers/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var customer $customer */
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            return $this->sendError('Customer not found');
        }

        return $this->sendResponse($customer->toArray(), 'Customer retrieved successfully');
    }

    /**
     * Update the specified customer in storage.
     * PUT/PATCH /customers/{id}
     */
    public function update($id, UpdatecustomerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var customer $customer */
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            return $this->sendError('Customer not found');
        }

        $customer = $this->customerRepository->update($input, $id);

        return $this->sendResponse($customer->toArray(), 'customer updated successfully');
    }

    /**
     * Remove the specified customer from storage.
     * DELETE /customers/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var customer $customer */
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            return $this->sendError('Customer not found');
        }

        $customer->delete();

        return $this->sendSuccess('Customer deleted successfully');
    }
}
