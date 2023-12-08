<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createaddress_districtAPIRequest;
use App\Http\Requests\API\Updateaddress_districtAPIRequest;
use App\Models\address_district;
use App\Repositories\address_districtRepository;
use App\Repositories\address_provinceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
/**
 * Class address_districtAPIController
 */
class address_districtAPIController extends AppBaseController
{
    private address_districtRepository $addressDistrictRepository;
    private address_provinceRepository $addressProvinceRepository;

    public function __construct(address_districtRepository $addressDistrictRepo,address_provinceRepository $addressProvinceRepo)
    {
        $this->addressDistrictRepository = $addressDistrictRepo;
        $this->addressProvinceRepository = $addressProvinceRepo;

        
    }

    /**
     * Display a listing of the address_districts.
     * GET|HEAD /address_districts
     */
    public function index(Request $request): JsonResponse
    {
        $addressDistricts = $this->addressDistrictRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($addressDistricts->toArray(), 'Address Districts retrieved successfully');
    }

    /**
     * Store a newly created address_district in storage.
     * POST /address_districts
     */
    public function store(Createaddress_districtAPIRequest $request)/**: JsonResponse */
    {
        try {

            DB::beginTransaction();

            $input = $request->all();

            $input['id'] = $input['uid'];

             $addressProvince = $this->addressProvinceRepository->whereFirst(['name' =>$input['province_name']]);
            
            if (empty($addressProvince)) {
                $addressProvince = $this->addressProvinceRepository->create(['name' =>$input['province_name']]);
            }

            $input['province_uid'] = $addressProvince->id;

            $addressDistrict = $this->addressDistrictRepository->creatOrUdate($input);

            DB::commit();
            
            return $this->sendResponse($addressDistrict->toArray(), 'Address District saved successfully');
        
        } catch (\Exception $ex) {
            //throw $th;
            DB::rollBack();
            return $this->sendResponse([], 'Error can not create ');

            
        }
    }

    /**
     * Display the specified address_district.
     * GET|HEAD /address_districts/{id}
     */
    public function show($id): JsonResponse
    {
        
        /** @var address_district $addressDistrict */
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            return $this->sendError('Address District not found');
        }

        return $this->sendResponse($addressDistrict->toArray(), 'Address District retrieved successfully');
    }

    /**
     * Update the specified address_district in storage.
     * PUT/PATCH /address_districts/{id}
     */
    public function update($id, Updateaddress_districtAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        /** @var address_district $addressDistrict */
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            return $this->sendError('Address District not found');
        }

        $addressDistrict = $this->addressDistrictRepository->update($input, $id);

        return $this->sendResponse($addressDistrict->toArray(), 'address_district updated successfully');
    }

    /**
     * Remove the specified address_district from storage.
     * DELETE /address_districts/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var address_district $addressDistrict */
        $addressDistrict = $this->addressDistrictRepository->find($id);

        if (empty($addressDistrict)) {
            return $this->sendError('Address District not found');
        }

        $addressDistrict->delete();

        return $this->sendSuccess('Address District deleted successfully');
    }
}
