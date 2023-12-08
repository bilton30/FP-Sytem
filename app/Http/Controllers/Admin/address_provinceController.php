<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createaddress_provinceRequest;
use App\Http\Requests\Updateaddress_provinceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\address_provinceRepository;
use App\Models\address_province;
use Illuminate\Http\Request;
use Flash;
use Inertia\Inertia;
class address_provinceController extends AppBaseController
{
    /** @var address_provinceRepository $addressProvinceRepository*/
    private $addressProvinceRepository;

    public function __construct(address_provinceRepository $addressProvinceRepo)
    {
        $this->addressProvinceRepository = $addressProvinceRepo;
    }

    /**
     * Display a listing of the address_province.
     */
    public function index(Request $request)
    {
        $posts = address_province::first();
// return$posts = $this->addressProvinceRepository->first();
        return Inertia::render('post',compact("posts"));
        return view('address_provinces.index')
            ->with('addressProvinces', $addressProvinces);
    }

    /**
     * Show the form for creating a new address_province.
     */
    public function create()
    {
        return view('address_provinces.create');
    }

    /**
     * Store a newly created address_province in storage.
     */
    public function store(Createaddress_provinceRequest $request)
    {
        $input = $request->all();

        $addressProvince = $this->addressProvinceRepository->create($input);

        Flash::success('Address Province saved successfully.');

        return redirect(route('addressProvinces.index'));
    }

    /**
     * Display the specified address_province.
     */
    public function show($id)
    {
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            Flash::error('Address Province not found');

            return redirect(route('addressProvinces.index'));
        }

        return view('address_provinces.show')->with('addressProvince', $addressProvince);
    }

    /**
     * Show the form for editing the specified address_province.
     */
    public function edit($id)
    {
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            Flash::error('Address Province not found');

            return redirect(route('addressProvinces.index'));
        }

        return view('address_provinces.edit')->with('addressProvince', $addressProvince);
    }

    /**
     * Update the specified address_province in storage.
     */
    public function update($id, Updateaddress_provinceRequest $request)
    {
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            Flash::error('Address Province not found');

            return redirect(route('addressProvinces.index'));
        }

        $addressProvince = $this->addressProvinceRepository->update($request->all(), $id);

        Flash::success('Address Province updated successfully.');

        return redirect(route('addressProvinces.index'));
    }

    /**
     * Remove the specified address_province from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            Flash::error('Address Province not found');

            return redirect(route('addressProvinces.index'));
        }

        $this->addressProvinceRepository->delete($id);

        Flash::success('Address Province deleted successfully.');

        return redirect(route('addressProvinces.index'));
    }
}
