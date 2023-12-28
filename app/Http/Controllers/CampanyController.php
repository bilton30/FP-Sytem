<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use App\Models\company;
use App\Models\Branch;
use Inertia\Inertia;
use Validator;
use Illuminate\Support\Facades\DB;
class CampanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        return Inertia::render('setup/index',compact("data"));
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
      return "working";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        try {
            //code...
            DB::beginTransaction();
            return $request->all();
                $validator = Validator::make($request->all(), [
                    'branch.*.name'=> 'required',
                    'branch.*.nuit'=> 'required',
                    'branch.*.email'=> 'required',
                    'branch.*.contact1'=> 'required',
                    'branch.*.address'=> 'required',
                    'name' => 'required|unique:companies,name', 
                    'nuit' => 'required|unique:companies,nuit',
                    'email' => 'required|unique:companies,email', 
                    'contact1'=> 'required',
                    'address'=> 'required',
                ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()],501);
            }
            $input = $request->all();
     
            $input['userOwnerUID']=auth()->user()->id;
            $company =  Company::create( $input );
        
            if($company){
                foreach ($input['branch'] as $values) {

                    $values['company_id'] = $company->id;

                    Branch::create( $values );
                }
            }
            DB::commit();
            return response()->json(["success" => true, 'message' => 'Company created successfully!']);
        } catch (\Throwable $th) {      
            DB::rollback();
            return response()->json(["message" => $th->getMessage() ]);
        }
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
