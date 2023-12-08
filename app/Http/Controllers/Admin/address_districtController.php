<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createaddress_districtRequest;
use App\Http\Requests\Updateaddress_districtRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\address_districtRepository;
use Illuminate\Http\Request;
use Flash;
use Inertia\Inertia;


class address_districtController extends AppBaseController
{
    /** @var address_districtRepository $addressDistrictRepository*/
    private $addressDistrictRepository;

    public function __construct(address_districtRepository $addressDistrictRepo)
    {
        $this->addressDistrictRepository = $addressDistrictRepo;
    }

    /**
     * Display a listing of the address_district.
     */
    public function index(Request $request)
    {
        $original = $this->addressDistrictRepository->paginate(10);
        
       

        return view('address_districts.index')
            ->with('addressDistricts', $addressDistricts);
    }

    /**
     * Show the form for creating a new address_district.
     */
    public function create()
    {
        return view('address_districts.create');
    }

    /**
     * Store a newly created address_district in storage.
     */
    public function store(Createaddress_districtRequest $request)
    {
        $input = $request->all();

        $addressDistrict = $this->addressDistrictRepository->create($input);

        Flash::success('Address District saved successfully.');

        return redirect(route('addressDistricts.index'));
    }

    /**
     * Display the specified address_district.
     */
    public function show($id)
    {
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            Flash::error('Address District not found');

            return redirect(route('addressDistricts.index'));
        }

        return view('address_districts.show')->with('addressDistrict', $addressDistrict);
    }

    /**
     * Show the form for editing the specified address_district.
     */
    public function edit($id)
    {
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            Flash::error('Address District not found');

            return redirect(route('addressDistricts.index'));
        }

        return view('address_districts.edit')->with('addressDistrict', $addressDistrict);
    }

    /**
     * Update the specified address_district in storage.
     */
    public function update($id, Updateaddress_districtRequest $request)
    {
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            Flash::error('Address District not found');

            return redirect(route('addressDistricts.index'));
        }

        $addressDistrict = $this->addressDistrictRepository->update($request->all(), $id);

        Flash::success('Address District updated successfully.');

        return redirect(route('addressDistricts.index'));
    }

    /**
     * Remove the specified address_district from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            Flash::error('Address District not found');

            return redirect(route('addressDistricts.index'));
        }

        $this->addressDistrictRepository->delete($id);

        Flash::success('Address District deleted successfully.');

        return redirect(route('addressDistricts.index'));
    }
}
