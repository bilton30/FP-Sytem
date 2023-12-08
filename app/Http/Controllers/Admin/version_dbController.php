<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createversion_dbRequest;
use App\Http\Requests\Updateversion_dbRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\version_dbRepository;
use Illuminate\Http\Request;
use Flash;

class version_dbController extends AppBaseController
{
    /** @var version_dbRepository $versionDbRepository*/
    private $versionDbRepository;

    public function __construct(version_dbRepository $versionDbRepo)
    {
        $this->versionDbRepository = $versionDbRepo;
    }

    /**
     * Display a listing of the version_db.
     */
    public function index(Request $request)
    {
        $versionDbs = $this->versionDbRepository->paginate(10);

        return view('version_dbs.index')
            ->with('versionDbs', $versionDbs);
    }

    /**
     * Show the form for creating a new version_db.
     */
    public function create()
    {
        return view('version_dbs.create');
    }

    /**
     * Store a newly created version_db in storage.
     */
    public function store(Createversion_dbRequest $request)
    {
        $input = $request->all();

        $versionDb = $this->versionDbRepository->create($input);

        Flash::success('Version Db saved successfully.');

        return redirect(route('versionDbs.index'));
    }

    /**
     * Display the specified version_db.
     */
    public function show($id)
    {
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            Flash::error('Version Db not found');

            return redirect(route('versionDbs.index'));
        }

        return view('version_dbs.show')->with('versionDb', $versionDb);
    }

    /**
     * Show the form for editing the specified version_db.
     */
    public function edit($id)
    {
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            Flash::error('Version Db not found');

            return redirect(route('versionDbs.index'));
        }

        return view('version_dbs.edit')->with('versionDb', $versionDb);
    }

    /**
     * Update the specified version_db in storage.
     */
    public function update($id, Updateversion_dbRequest $request)
    {
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            Flash::error('Version Db not found');

            return redirect(route('versionDbs.index'));
        }

        $versionDb = $this->versionDbRepository->update($request->all(), $id);

        Flash::success('Version Db updated successfully.');

        return redirect(route('versionDbs.index'));
    }

    /**
     * Remove the specified version_db from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $versionDb = $this->versionDbRepository->find($id);

        if (empty($versionDb)) {
            Flash::error('Version Db not found');

            return redirect(route('versionDbs.index'));
        }

        $this->versionDbRepository->delete($id);

        Flash::success('Version Db deleted successfully.');

        return redirect(route('versionDbs.index'));
    }
}
