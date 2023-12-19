<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use App\Models\company;
use Inertia\Inertia;
class CampanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return " estou aqui";
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


    public function setup()
    {
        $data=[];
         return Inertia::render('setup/index',compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validator = \Validator::make($request->all(), [
    //         'name' => 'required|name|unique:companies,name', 
    //         'nuit' => 'required|nuit|unique:companies,nuit',
    //         'email' => 'required|email|unique:companies,email', 
    //         'contact1'=> 'required',
    //         'address'=> 'required',
    //     ]);

    // if ($validator->fails()) {
    //     return response()->json(['errors' => $validator->errors()->all()],501);
    // }
    //  $input = $request->all();
    //  $input['userOwnerUID']=auth()->user()->id
    //   $company =  Company::create( $input );
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
