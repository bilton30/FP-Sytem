<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemessageAPIRequest;
use App\Http\Requests\API\UpdatemessageAPIRequest;
use App\Models\message;
use App\Repositories\messageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class messageAPIController
 */
class messageAPIController extends AppBaseController
{
    private messageRepository $messageRepository;

    public function __construct(messageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the messages.
     * GET|HEAD /messages
     */
    public function index(Request $request): JsonResponse
    {
        $messages = $this->messageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($messages->toArray(), 'Messages retrieved successfully');
    }

    /**
     * Store a newly created message in storage.
     * POST /messages
     */
    public function store(CreatemessageAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        
        $input['id'] = $input['uid'];

        $message = $this->messageRepository->creatOrUdate($input);

        return $this->sendResponse($message->toArray(), 'Message saved successfully');
    }

    /**
     * Display the specified message.
     * GET|HEAD /messages/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        return $this->sendResponse($message->toArray(), 'Message retrieved successfully');
    }

    /**
     * Update the specified message in storage.
     * PUT/PATCH /messages/{id}
     */
    public function update($id, UpdatemessageAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message = $this->messageRepository->update($input, $id);

        return $this->sendResponse($message->toArray(), 'message updated successfully');
    }

    /**
     * Remove the specified message from storage.
     * DELETE /messages/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var message $message */
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message->delete();

        return $this->sendSuccess('Message deleted successfully');
    }
}
