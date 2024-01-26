<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:user-|index-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-destroy', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
         $data = User::with("roles")->orderBy('name', 'DESC')->get();
         if( $request->wantsJson()){
            return $data;
        }
        return Inertia::render('users/index',compact("data"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('name', 'id')->get();
        return response()->json($roles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
         try{
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirmPassword',
            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],501);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
         $user->assignRole($request->input('roles'));

        DB::commit();
        return response()->json(['message' => 'Usuário criado com sucesso!']);
    } catch (\Exception $ex) {
        DB::rollback();
        return response()->json(['message' => 'Impossivel criar Utilizador!'], 501);
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
        $user = User::find($id);
        return $user;
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = User::with('roles')->find($id);
        if(!$user){
            return response()->json(['message' => 'user not found!'],501);
        }
        return  $user;
       
  
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
        DB::beginTransaction();

        try{
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'same:confirmPassword',
                'roles' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()],500);
            }

            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = \Arr::except($input, array('password'));
            }


            $user = User::find($id);
            $user->update($input);

            $user->syncRoles($request->get('roles'));
            DB::commit();
            return response()->json(['message' => 'Usuário actualizado com sucesso!']);
            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json(['message' => 'Impossivel actualizar Utilizador!','error'=>$ex], 501);
            }
        }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return response()->json(['message'=>'Utilizador elimidado com sucesso!']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Impossivel eliminar Utilizador!'], 501);

        }
     
       
    }

    function customUpdate(Request $request)
    {
        try {

            $user = Auth::user();
            if (isset($request->name)) {
                $user->name = $request->name;
            }
            if (isset($request->email)) {
                $user->email = $request->email;
            }
            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }
            if (isset($request->current)) {
                if(Hash::check($user->password,$request->current)){
                    $user->password = Hash::make($request->password);
                }else{
                    return response()->json(["message" =>'passoword invalido!' ]);
                }
               
            }
            if (isset($request->avatar)) {
                $name = Str::uuid();
                $extension = $request->file('avatar')->extension();
                $path = '/avatar/';
                // dd(public_path($path));
                $request->file('avatar')->move(public_path($path), $name . '.' . $extension);
                $user->avatar = $path . $name . '.' . $extension;
            }
            $user->save();
        
            return response()->json(["success" => true, "message" => "Actualizado com sucesso!", "data" => $user]);
            //code...
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage() ]);
        }
    }
}
