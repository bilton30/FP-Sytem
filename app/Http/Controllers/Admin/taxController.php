<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetaxRequest;
use App\Http\Requests\UpdatetaxRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\taxRepository;
use Illuminate\Http\Request;
use Flash;

class taxController extends AppBaseController
{
    /** @var taxRepository $taxRepository*/
    private $taxRepository;

    public function __construct(taxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    /**
     * Display a listing of the tax.
     */
    public function index(Request $request)
    {
        $taxes = $this->taxRepository->paginate(10);

        return view('taxes.index')
            ->with('taxes', $taxes);
    }

    /**
     * Show the form for creating a new tax.
     */
    public function create()
    {
        return view('taxes.create');
    }

    /**
     * Store a newly created tax in storage.
     */
    public function store(CreatetaxRequest $request)
    {
        $input = $request->all();

        $tax = $this->taxRepository->create($input);

        Flash::success('Tax saved successfully.');

        return redirect(route('taxes.index'));
    }

    /**
     * Display the specified tax.
     */
    public function show($id)
    {
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        return view('taxes.show')->with('tax', $tax);
    }

    /**
     * Show the form for editing the specified tax.
     */
    public function edit($id)
    {
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        return view('taxes.edit')->with('tax', $tax);
    }

    /**
     * Update the specified tax in storage.
     */
    public function update($id, UpdatetaxRequest $request)
    {
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        $tax = $this->taxRepository->update($request->all(), $id);

        Flash::success('Tax updated successfully.');

        return redirect(route('taxes.index'));
    }

    /**
     * Remove the specified tax from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        $this->taxRepository->delete($id);

        Flash::success('Tax deleted successfully.');

        return redirect(route('taxes.index'));
    }
}
