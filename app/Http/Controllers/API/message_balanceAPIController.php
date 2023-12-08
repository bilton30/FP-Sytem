<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmessage_balanceAPIRequest;
use App\Http\Requests\API\Updatemessage_balanceAPIRequest;
use App\Models\message_balance;
use App\Repositories\message_balanceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class message_balanceAPIController
 */
class message_balanceAPIController extends AppBaseController
{
    private message_balanceRepository $messageBalanceRepository;

    public function __construct(message_balanceRepository $messageBalanceRepo)
    {
        $this->messageBalanceRepository = $messageBalanceRepo;
    }

    /**
     * Display a listing of the message_balances.
     * GET|HEAD /message_balances
     */
    public function index(Request $request): JsonResponse
    {
        $messageBalances = $this->messageBalanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($messageBalances->toArray(), 'Message Balances retrieved successfully');
    }

    /**
     * Store a newly created message_balance in storage.
     * POST /message_balances
     */
    public function store(Createmessage_balanceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $messageBalance = $this->messageBalanceRepository->creatOrUdate($input);

        return $this->sendResponse($messageBalance->toArray(), 'Message Balance saved successfully');
    }

    /**
     * Display the specified message_balance.
     * GET|HEAD /message_balances/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var message_balance $messageBalance */
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            return $this->sendError('Message Balance not found');
        }

        return $this->sendResponse($messageBalance->toArray(), 'Message Balance retrieved successfully');
    }

    /**
     * Update the specified message_balance in storage.
     * PUT/PATCH /message_balances/{id}
     */
    public function update($id, Updatemessage_balanceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var message_balance $messageBalance */
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            return $this->sendError('Message Balance not found');
        }

        $messageBalance = $this->messageBalanceRepository->update($input, $id);

        return $this->sendResponse($messageBalance->toArray(), 'message_balance updated successfully');
    }

    /**
     * Remove the specified message_balance from storage.
     * DELETE /message_balances/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var message_balance $messageBalance */
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            return $this->sendError('Message Balance not found');
        }

        $messageBalance->delete();

        return $this->sendSuccess('Message Balance deleted successfully');
    }
}
