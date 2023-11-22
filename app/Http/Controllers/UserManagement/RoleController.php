<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    //  assigning middlewares to specific routes
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','show']]);
         $this->middleware('permission:role-create', ['only' => ['store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // $roles = Role::whereNotIn('name', ['Admin'])->get();
        $roles = Role::all();
        $permission = Permission::get();
        
        return view('User-Management.Roles.list', compact('roles','permission'));
    }
    
    public function sh_pr($id){
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$id)
            ->get();
            // dd($rolePermissions);
        return view('User-Management.Roles.showpermission',compact('role','rolePermissions'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('index.page')
                        ->with('success','Role created successfully');
    }

    public function edit($id) 
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('User-Management.Roles.edit',compact('role','permission','rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable|string',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->description = $request->input('description'); // Include description in the update

        $role->save();
        // dd($request->input('permission'));
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('index.page')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('index.page')
                        ->with('success','Role deleted successfully');
    }


}
