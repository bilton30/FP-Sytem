<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcustomer_bankAPIRequest;
use App\Http\Requests\API\Updatecustomer_bankAPIRequest;
use App\Models\customer_bank;
use App\Repositories\customer_bankRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class customer_bankAPIController
 */
class customer_bankAPIController extends AppBaseController
{
    private customer_bankRepository $customerBankRepository;

    public function __construct(customer_bankRepository $customerBankRepo)
    {
        $this->customerBankRepository = $customerBankRepo;
    }

    /**
     * Display a listing of the customer_banks.
     * GET|HEAD /customer_banks
     */
    public function index(Request $request): JsonResponse
    {
        $customerBanks = $this->customerBankRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customerBanks->toArray(), 'Customer Banks retrieved successfully');
    }

    /**
     * Store a newly created customer_bank in storage.
     * POST /customer_banks
     */
    public function store(Createcustomer_bankAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        
        $input['id'] = $input['uid'];

        $customerBank = $this->customerBankRepository->creatOrUdate($input);

        return $this->sendResponse($customerBank->toArray(), 'Customer Bank saved successfully');
    }

    /**
     * Display the specified customer_bank.
     * GET|HEAD /customer_banks/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var customer_bank $customerBank */
        $customerBank = $this->customerBankRepository->find($id);

        if (empty($customerBank)) {
            return $this->sendError('Customer Bank not found');
        }

        return $this->sendResponse($customerBank->toArray(), 'Customer Bank retrieved successfully');
    }

    /**
     * Update the specified customer_bank in storage.
     * PUT/PATCH /customer_banks/{id}
     */
    public function update($id, Updatecustomer_bankAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var customer_bank $customerBank */
        $customerBank = $this->customerBankRepository->find($id);

        if (empty($customerBank)) {
            return $this->sendError('Customer Bank not found');
        }

        $customerBank = $this->customerBankRepository->update($input, $id);

        return $this->sendResponse($customerBank->toArray(), 'customer_bank updated successfully');
    }

    /**
     * Remove the specified customer_bank from storage.
     * DELETE /customer_banks/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var customer_bank $customerBank */
        $customerBank = $this->customerBankRepository->find($id);

        if (empty($customerBank)) {
            return $this->sendError('Customer Bank not found');
        }

        $customerBank->delete();

        return $this->sendSuccess('Customer Bank deleted successfully');
    }
}
