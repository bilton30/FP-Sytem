<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetariffRequest;
use App\Http\Requests\UpdatetariffRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\tariffRepository;
use Illuminate\Http\Request;
use Flash;

class tariffController extends AppBaseController
{
    /** @var tariffRepository $tariffRepository*/
    private $tariffRepository;

    public function __construct(tariffRepository $tariffRepo)
    {
        $this->tariffRepository = $tariffRepo;
    }

    /**
     * Display a listing of the tariff.
     */
    public function index(Request $request)
    {
        $tariffs = $this->tariffRepository->paginate(10);

        return view('tariffs.index')
            ->with('tariffs', $tariffs);
    }

    /**
     * Show the form for creating a new tariff.
     */
    public function create()
    {
        return view('tariffs.create');
    }

    /**
     * Store a newly created tariff in storage.
     */
    public function store(CreatetariffRequest $request)
    {
        $input = $request->all();

        $tariff = $this->tariffRepository->create($input);

        Flash::success('Tariff saved successfully.');

        return redirect(route('tariffs.index'));
    }

    /**
     * Display the specified tariff.
     */
    public function show($id)
    {
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        return view('tariffs.show')->with('tariff', $tariff);
    }

    /**
     * Show the form for editing the specified tariff.
     */
    public function edit($id)
    {
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        return view('tariffs.edit')->with('tariff', $tariff);
    }

    /**
     * Update the specified tariff in storage.
     */
    public function update($id, UpdatetariffRequest $request)
    {
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        $tariff = $this->tariffRepository->update($request->all(), $id);

        Flash::success('Tariff updated successfully.');

        return redirect(route('tariffs.index'));
    }

    /**
     * Remove the specified tariff from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tariff = $this->tariffRepository->find($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        $this->tariffRepository->delete($id);

        Flash::success('Tariff deleted successfully.');

        return redirect(route('tariffs.index'));
    }
}
