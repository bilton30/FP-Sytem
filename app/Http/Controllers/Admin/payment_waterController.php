<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createpayment_waterRequest;
use App\Http\Requests\Updatepayment_waterRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\payment_waterRepository;
use Illuminate\Http\Request;
use Flash;

class payment_waterController extends AppBaseController
{
    /** @var payment_waterRepository $paymentWaterRepository*/
    private $paymentWaterRepository;

    public function __construct(payment_waterRepository $paymentWaterRepo)
    {
        $this->paymentWaterRepository = $paymentWaterRepo;
    }

    /**
     * Display a listing of the payment_water.
     */
    public function index(Request $request)
    {
        $paymentWaters = $this->paymentWaterRepository->paginate(10);

        return view('payment_waters.index')
            ->with('paymentWaters', $paymentWaters);
    }

    /**
     * Show the form for creating a new payment_water.
     */
    public function create()
    {
        return view('payment_waters.create');
    }

    /**
     * Store a newly created payment_water in storage.
     */
    public function store(Createpayment_waterRequest $request)
    {
        $input = $request->all();

        $paymentWater = $this->paymentWaterRepository->create($input);

        Flash::success('Payment Water saved successfully.');

        return redirect(route('paymentWaters.index'));
    }

    /**
     * Display the specified payment_water.
     */
    public function show($id)
    {
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            Flash::error('Payment Water not found');

            return redirect(route('paymentWaters.index'));
        }

        return view('payment_waters.show')->with('paymentWater', $paymentWater);
    }

    /**
     * Show the form for editing the specified payment_water.
     */
    public function edit($id)
    {
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            Flash::error('Payment Water not found');

            return redirect(route('paymentWaters.index'));
        }

        return view('payment_waters.edit')->with('paymentWater', $paymentWater);
    }

    /**
     * Update the specified payment_water in storage.
     */
    public function update($id, Updatepayment_waterRequest $request)
    {
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            Flash::error('Payment Water not found');

            return redirect(route('paymentWaters.index'));
        }

        $paymentWater = $this->paymentWaterRepository->update($request->all(), $id);

        Flash::success('Payment Water updated successfully.');

        return redirect(route('paymentWaters.index'));
    }

    /**
     * Remove the specified payment_water from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paymentWater = $this->paymentWaterRepository->find($id);

        if (empty($paymentWater)) {
            Flash::error('Payment Water not found');

            return redirect(route('paymentWaters.index'));
        }

        $this->paymentWaterRepository->delete($id);

        Flash::success('Payment Water deleted successfully.');

        return redirect(route('paymentWaters.index'));
    }
}
