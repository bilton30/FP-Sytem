<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createversion_dbAPIRequest;
use App\Http\Requests\API\Updateversion_dbAPIRequest;
use App\Models\version_db;
use App\Repositories\version_dbRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class version_dbAPIController
 */
class version_dbAPIController extends AppBaseController
{
    private version_dbRepository $versionDbRepository;

    public function __construct(version_dbRepository $versionDbRepo)
    {
        $this->versionDbRepository = $versionDbRepo;
    }

    /**
     * Display a listing of the version_dbs.
     * GET|HEAD /version_dbs
     */
    public function index(Request $request): JsonResponse
    {
        $versionDbs = $this->versionDbRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($versionDbs->toArray(), 'Version Dbs retrieved successfully');
    }

    /**
     * Store a newly created version_db in storage.
     * POST /version_dbs
     */
    public function store(Createversion_dbAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $versionDb = $this->versionDbRepository->creatOrUdate($input);

        return $this->sendResponse($versionDb->toArray(), 'Version Db saved successfully');
    }

    /**
     * Display the specified version_db.
     * GET|HEAD /version_dbs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var version_db $versionDb */
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            return $this->sendError('Version Db not found');
        }

        return $this->sendResponse($versionDb->toArray(), 'Version Db retrieved successfully');
    }

    /**
     * Update the specified version_db in storage.
     * PUT/PATCH /version_dbs/{id}
     */
    public function update($id, Updateversion_dbAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var version_db $versionDb */
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            return $this->sendError('Version Db not found');
        }

        $versionDb = $this->versionDbRepository->update($input, $id);

        return $this->sendResponse($versionDb->toArray(), 'version_db updated successfully');
    }

    /**
     * Remove the specified version_db from storage.
     * DELETE /version_dbs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var version_db $versionDb */
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            return $this->sendError('Version Db not found');
        }

        $versionDb->delete();

        return $this->sendSuccess('Version Db deleted successfully');
    }
}
