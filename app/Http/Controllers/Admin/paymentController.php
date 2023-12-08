<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepaymentRequest;
use App\Http\Requests\UpdatepaymentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\paymentRepository;
use Illuminate\Http\Request;
use Flash;

class paymentController extends AppBaseController
{
    /** @var paymentRepository $paymentRepository*/
    private $paymentRepository;

    public function __construct(paymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the payment.
     */
    public function index(Request $request)
    {
        $payments = $this->paymentRepository->paginate(10);

        return view('payments.index')
            ->with('payments', $payments);
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(CreatepaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified payment.
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payment', $payment);
    }

    /**
     * Update the specified payment in storage.
     */
    public function update($id, UpdatepaymentRequest $request)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Payment updated successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified payment from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }
}
