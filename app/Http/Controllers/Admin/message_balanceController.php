<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createmessage_balanceRequest;
use App\Http\Requests\Updatemessage_balanceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\message_balanceRepository;
use Illuminate\Http\Request;
use Flash;

class message_balanceController extends AppBaseController
{
    /** @var message_balanceRepository $messageBalanceRepository*/
    private $messageBalanceRepository;

    public function __construct(message_balanceRepository $messageBalanceRepo)
    {
        $this->messageBalanceRepository = $messageBalanceRepo;
    }

    /**
     * Display a listing of the message_balance.
     */
    public function index(Request $request)
    {
        $messageBalances = $this->messageBalanceRepository->paginate(10);

        return view('message_balances.index')
            ->with('messageBalances', $messageBalances);
    }

    /**
     * Show the form for creating a new message_balance.
     */
    public function create()
    {
        return view('message_balances.create');
    }

    /**
     * Store a newly created message_balance in storage.
     */
    public function store(Createmessage_balanceRequest $request)
    {
        $input = $request->all();

        $messageBalance = $this->messageBalanceRepository->create($input);

        Flash::success('Message Balance saved successfully.');

        return redirect(route('messageBalances.index'));
    }

    /**
     * Display the specified message_balance.
     */
    public function show($id)
    {
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            Flash::error('Message Balance not found');

            return redirect(route('messageBalances.index'));
        }

        return view('message_balances.show')->with('messageBalance', $messageBalance);
    }

    /**
     * Show the form for editing the specified message_balance.
     */
    public function edit($id)
    {
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            Flash::error('Message Balance not found');

            return redirect(route('messageBalances.index'));
        }

        return view('message_balances.edit')->with('messageBalance', $messageBalance);
    }

    /**
     * Update the specified message_balance in storage.
     */
    public function update($id, Updatemessage_balanceRequest $request)
    {
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            Flash::error('Message Balance not found');

            return redirect(route('messageBalances.index'));
        }

        $messageBalance = $this->messageBalanceRepository->update($request->all(), $id);

        Flash::success('Message Balance updated successfully.');

        return redirect(route('messageBalances.index'));
    }

    /**
     * Remove the specified message_balance from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $messageBalance = $this->messageBalanceRepository->find($id);

        if (empty($messageBalance)) {
            Flash::error('Message Balance not found');

            return redirect(route('messageBalances.index'));
        }

        $this->messageBalanceRepository->delete($id);

        Flash::success('Message Balance deleted successfully.');

        return redirect(route('messageBalances.index'));
    }
}
