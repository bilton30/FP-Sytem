<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Auth;
class RolesController extends Controller
{
    use PermissionGeneratorController;
    
    public function __construct()
    {
      
        // $this->middleware(['auth','verified']);
        // $this->middleware('permission:roles-|index-create|roles-edit|roles-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:roles-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:roles-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:roles-destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    
    {
        $data = Role::orderBy('id', 'DESC')->get();
        if( $request->wantsJson()){
            return $data;
        }
        
       
        return Inertia::render('roles/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response
     */
    

    public function create(Request $request)
    {
        $permission = [];
        $this->synchronizelPermission();
        if(Auth::user()->hasRole('landlord')){
            $permission = Permission::get();
        }else{
            $permission = Permission::where('guard_name','web')->get();
        }
        return response()->json($permission);
    }

    /**
     * Store a newly created resource in storage.

     *

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'guard_name' => 'required',

        ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all()],500);
    }

        $role = Role::create(['name' => $request->input('name'),'name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return response()->json(['message'=>'Nivel de Acesso criado com sucesso!']);

    }

    /**
     * Display the specified resource.

     *

     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')

            ->where('role_has_permissions.role_id', $id)

            ->get();

        return response()->json(['role'=>$role,'rolePermissions'=> $rolePermissions]);

    }

    /**
     * Show the form for editing the specified resource.

     *

     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
         if ($request->get('sincronizar') === 'all') {
             if($this->synchronizelPermission()){
                return redirect()->route('roles.edit',[$id])->with('success', 'Permissões atualizadoas com sucesso!');
             }else{
                return redirect()->route('roles.edit',[$id])->with('error', 'Permissões não atualizadoas');
             }
        }

        $role = Role::find($id);
        $this->synchronizelPermission();
        $permission = Permission::get();

        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)

            // ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')

            ->get();

        return $rolePermissions;
    }

    /**
     * Update the specified resource in storage.

     *

     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',

            'permission' => 'required',
        ]);

        $role = Role::find($id);

        $role->name = $request->input('name');

        $role->guard_name = $request->input('guard_name');
        
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return response()->json(['message'=>'Nivel de Acesso atualizado com sucesso!']);

    }

    /**
     * Remove the specified resource from storage.

     *

     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id==1){
            return response()->json(['message'=>'Nivel de Acesso não pode ser elimidado!'],403);
        } else if($id==2){
            return response()->json(['message'=>'Nivel de Acesso não pode ser elimidado!'],403);
        }else if($id==3){
            return response()->json(['message'=>'Nivel de Acesso não pode ser elimidado!'],403);
        }
        DB::table('roles')->where('id', $id)->delete();

        return response()->json(['message'=>'Nivel de Acesso elimidado com sucesso!']);

    }
}
