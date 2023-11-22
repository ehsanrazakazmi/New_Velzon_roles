<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('Admin'))     // this allows to restrict the users to access this page
        {
            $data = User::orderBy('id','ASC')->paginate(5);
            $roles = Role::pluck('name','name')->all();         // retrieves all the values by given name key
            return view('User-Management.Users.list',compact('data','roles'))->with('i', ($request->input('page', 1) - 1) * 5);
            // Your existing logic for users.index
        } else {
            // return redirect()->back();
            return redirect()->back()->with('alert', 'Sorry you have no access');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles.*' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('user.index')->with('success','User created successfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('User-Management.Users.edit',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
        
            $input = $request->all();
            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }
            else{
                $input = Arr::except($input,array('password'));    
            }
        
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
        
            $user->assignRole($request->input('roles'));
        
            return redirect()->route('user.index')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
           User::find($id)->delete();
           return redirect()->route('user.index')->with('success','User deleted successfully');
    }
}
