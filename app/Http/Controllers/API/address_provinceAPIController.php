<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createaddress_provinceAPIRequest;
use App\Http\Requests\API\Updateaddress_provinceAPIRequest;
use App\Models\address_province;
use App\Repositories\address_provinceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class address_provinceAPIController
 */
class address_provinceAPIController extends AppBaseController
{
    private address_provinceRepository $addressProvinceRepository;

    public function __construct(address_provinceRepository $addressProvinceRepo)
    {
        $this->addressProvinceRepository = $addressProvinceRepo;
    }

    /**
     * Display a listing of the address_provinces.
     * GET|HEAD /address_provinces
     */
    public function index(Request $request): JsonResponse
    {
        $addressProvinces = $this->addressProvinceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($addressProvinces->toArray(), 'Address Provinces retrieved successfully');
    }

    /**
     * Store a newly created address_province in storage.
     * POST /address_provinces
     */
    public function store(Createaddress_provinceAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        
        $input['id'] = $input['uid'];

        $addressProvince = $this->addressProvinceRepository->creatOrUdate($input);

        return $this->sendResponse($addressProvince->toArray(), 'Address Province saved successfully');
    }

    /**
     * Display the specified address_province.
     * GET|HEAD /address_provinces/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var address_province $addressProvince */
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            return $this->sendError('Address Province not found');
        }

        return $this->sendResponse($addressProvince->toArray(), 'Address Province retrieved successfully');
    }

    /**
     * Update the specified address_province in storage.
     * PUT/PATCH /address_provinces/{id}
     */
    public function update($id, Updateaddress_provinceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var address_province $addressProvince */
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            return $this->sendError('Address Province not found');
        }

        $addressProvince = $this->addressProvinceRepository->update($input, $id);

        return $this->sendResponse($addressProvince->toArray(), 'address_province updated successfully');
    }

    /**
     * Remove the specified address_province from storage.
     * DELETE /address_provinces/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var address_province $addressProvince */
        $addressProvince = $this->addressProvinceRepository->find($id);

        if (empty($addressProvince)) {
            return $this->sendError('Address Province not found');
        }

        $addressProvince->delete();

        return $this->sendSuccess('Address Province deleted successfully');
    }
}
