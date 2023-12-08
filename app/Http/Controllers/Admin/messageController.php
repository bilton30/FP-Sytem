<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemessageRequest;
use App\Http\Requests\UpdatemessageRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\messageRepository;
use Illuminate\Http\Request;
use Flash;

class messageController extends AppBaseController
{
    /** @var messageRepository $messageRepository*/
    private $messageRepository;

    public function __construct(messageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the message.
     */
    public function index(Request $request)
    {
        $messages = $this->messageRepository->paginate(10);

        return view('messages.index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new message.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created message in storage.
     */
    public function store(CreatemessageRequest $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);

        Flash::success('Message saved successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified message.
     */
    public function show($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified message.
     */
    public function edit($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified message in storage.
     */
    public function update($id, UpdatemessageRequest $request)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success('Message updated successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified message from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message deleted successfully.');

        return redirect(route('messages.index'));
    }
}
