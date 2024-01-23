<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\SetupController;
use Inertia\Inertia;

class CompanyController extends AppBaseController
{
    use Upload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(SetupController $setupController){

        $this->setupController = $setupController;
        // $this->middleware('permission:roles-|index-create|roles-edit|roles-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:roles-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:roles-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:roles-destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
       
        return Inertia::render('setup/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        return $this->setupController->store($request);
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
