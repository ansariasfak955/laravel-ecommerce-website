<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $adminUser = User::where('role', 'admin')->first();
        // dd($adminUser);
        $users = User::join('roles','roles.id','=','users.role_id')->get(['users.*','roles.role']);
        // dd($users);
        return view('admin.user.index', compact('users','adminUser'));
    }
    public function store(Request $request){
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }
    public function create(Request $request){
        // dd($request->all());
        // $this->validate($request, [
        //     'name' => 'required',
        //     'role_id' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        $data = array(
            'name' => $request->name,
            'role_id' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );

        $create = User::create($data);
        
        if($create){
            return redirect()->route('admin.users')->with('success', 'User added successfull.');
        }else{
            return back()->with('error', 'Something with wrong.');
        }
        // return view('admin.user.create');
    }
    public function delete(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
    }
}
