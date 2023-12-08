<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createaddress_neighborhoodRequest;
use App\Http\Requests\Updateaddress_neighborhoodRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\address_neighborhoodRepository;
use Illuminate\Http\Request;
use Flash;

class address_neighborhoodController extends AppBaseController
{
    /** @var address_neighborhoodRepository $addressNeighborhoodRepository*/
    private $addressNeighborhoodRepository;

    public function __construct(address_neighborhoodRepository $addressNeighborhoodRepo)
    {
        $this->addressNeighborhoodRepository = $addressNeighborhoodRepo;
    }

    /**
     * Display a listing of the address_neighborhood.
     */
    public function index(Request $request)
    {
        $addressNeighborhoods = $this->addressNeighborhoodRepository->paginate(10);

        return view('address_neighborhoods.index')
            ->with('addressNeighborhoods', $addressNeighborhoods);
    }

    /**
     * Show the form for creating a new address_neighborhood.
     */
    public function create()
    {
        return view('address_neighborhoods.create');
    }

    /**
     * Store a newly created address_neighborhood in storage.
     */
    public function store(Createaddress_neighborhoodRequest $request)
    {
        $input = $request->all();

        $addressNeighborhood = $this->addressNeighborhoodRepository->create($input);

        Flash::success('Address Neighborhood saved successfully.');

        return redirect(route('addressNeighborhoods.index'));
    }

    /**
     * Display the specified address_neighborhood.
     */
    public function show($id)
    {
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            Flash::error('Address Neighborhood not found');

            return redirect(route('addressNeighborhoods.index'));
        }

        return view('address_neighborhoods.show')->with('addressNeighborhood', $addressNeighborhood);
    }

    /**
     * Show the form for editing the specified address_neighborhood.
     */
    public function edit($id)
    {
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            Flash::error('Address Neighborhood not found');

            return redirect(route('addressNeighborhoods.index'));
        }

        return view('address_neighborhoods.edit')->with('addressNeighborhood', $addressNeighborhood);
    }

    /**
     * Update the specified address_neighborhood in storage.
     */
    public function update($id, Updateaddress_neighborhoodRequest $request)
    {
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            Flash::error('Address Neighborhood not found');

            return redirect(route('addressNeighborhoods.index'));
        }

        $addressNeighborhood = $this->addressNeighborhoodRepository->update($request->all(), $id);

        Flash::success('Address Neighborhood updated successfully.');

        return redirect(route('addressNeighborhoods.index'));
    }

    /**
     * Remove the specified address_neighborhood from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            Flash::error('Address Neighborhood not found');

            return redirect(route('addressNeighborhoods.index'));
        }

        $this->addressNeighborhoodRepository->delete($id);

        Flash::success('Address Neighborhood deleted successfully.');

        return redirect(route('addressNeighborhoods.index'));
    }
}
