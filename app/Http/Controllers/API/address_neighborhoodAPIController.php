<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createaddress_neighborhoodAPIRequest;
use App\Http\Requests\API\Updateaddress_neighborhoodAPIRequest;
use App\Models\address_neighborhood;
use App\Repositories\address_neighborhoodRepository;
use App\Repositories\address_districtRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class address_neighborhoodAPIController
 */
class address_neighborhoodAPIController extends AppBaseController
{
    private address_neighborhoodRepository $addressNeighborhoodRepository;

    private address_districtRepository $addressDistrictRepository;

    public function __construct(address_districtRepository $addressDistrictRepo, address_neighborhoodRepository $addressNeighborhoodRepo)
    {
        $this->addressNeighborhoodRepository = $addressNeighborhoodRepo;

        $this->addressDistrictRepository = $addressDistrictRepo;
    }

    /**
     * Display a listing of the address_neighborhoods.
     * GET|HEAD /address_neighborhoods
     */
    public function index(Request $request): JsonResponse
    {
        $addressNeighborhoods = $this->addressNeighborhoodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($addressNeighborhoods->toArray(), 'Address Neighborhoods retrieved successfully');
    }

/**
     * Store a newly created address_neighborhood in storage.
     * POST /address_neighborhoods
     */
    public function store(Createaddress_neighborhoodAPIRequest $request)
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $addressDistrict = $this->addressDistrictRepository->find($input['district_uid']);

        if (empty($addressDistrict)) {
            return $this->sendError('Address District not found');
        }
        $input['district_uid'] =  $addressDistrict->id;

        $addressNeighborhood = $this->addressNeighborhoodRepository->creatOrUdate($input);

        return $this->sendResponse($addressNeighborhood->toArray(), 'Address Neighborhood saved successfully');
    }

    /**
     * Display the specified address_neighborhood.
     * GET|HEAD /address_neighborhoods/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var address_neighborhood $addressNeighborhood */
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            return $this->sendError('Address Neighborhood not found');
        }

        return $this->sendResponse($addressNeighborhood->toArray(), 'Address Neighborhood retrieved successfully');
    }

    /**
     * Update the specified address_neighborhood in storage.
     * PUT/PATCH /address_neighborhoods/{id}
     */
    public function update($id, Updateaddress_neighborhoodAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        /** @var address_neighborhood $addressNeighborhood */
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            return $this->sendError('Address Neighborhood not found');
        }

        $addressNeighborhood = $this->addressNeighborhoodRepository->update($input, $id);

        return $this->sendResponse($addressNeighborhood->toArray(), 'address_neighborhood updated successfully');
    }

    /**
     * Remove the specified address_neighborhood from storage.
     * DELETE /address_neighborhoods/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var address_neighborhood $addressNeighborhood */
        $addressNeighborhood = $this->addressNeighborhoodRepository->find($id);

        if (empty($addressNeighborhood)) {
            return $this->sendError('Address Neighborhood not found');
        }

        $addressNeighborhood->delete();

        return $this->sendSuccess('Address Neighborhood deleted successfully');
    }
}
