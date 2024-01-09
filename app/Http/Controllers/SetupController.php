<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Multitenancy\Models\Tenant;
use App\Models\company;
use App\Models\Branch;
use Inertia\Inertia;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Upload;
use Illuminate\Support\Facades\Artisan;
use App\Models\TenantModel;
class SetupController extends AppBaseController
{
    use Upload;
    protected $company;

    public function __construct(){

        // $this->$company = $companyController;
    }
    public function index(){

  
    //  return  $tenant ;
            return Inertia::render('setup/index');
    }

    public function store(Request $request){
        try {
            //code...
            DB::beginTransaction();
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
            $input['logo'] = $this->uploadImage($request->logo, 'company');
            $input['userOwnerUID']=auth()->user()->id;

            auth()->user()->assignRole('company');

            $company =  Company::create( $input );
        
            if($company){
                foreach ($input['branch'] as $values) {
                    $values['company_id'] = $company->id;
                    $values['logo'] = $this->uploadImage( $values['logo'], 'company');
                    Branch::create( $values );
                }
            }

                $this->createTenent($company->name,$company->id);
                

            DB::commit();
            return response()->json(["success" => true, 'message' => 'Company created successfully!']);
        } catch (\Throwable $th) {      
            DB::rollback();
            return $this->sendError(["message" => $th->getMessage() ]);
        }
    }

   public function createTenent($name,$id)
   {   
        try {
            
            DB::beginTransaction();

            $tenant = Tenant::whereName($name)->first();
            if ($tenant) {
                $company = company::find($id);
                $name = $company->nuit.'_'. $company->name;
            }
          
            $tenant =  TenantModel::create([
                    'name' => $name,
                    'company_id' => $id,
                    'domain' => $name.'.'.request()->getHost(),
                    'database' => "SGB_tenant_".$name,
                ]);

            DB::commit();
    } catch (\Exception $th) {
        DB::rollback();
        return $this->sendError("Can not create tenant  ".$name."please contact the admin");
        //throw $th;
    }
   }

    
}
