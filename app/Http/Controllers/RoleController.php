<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request){
        // $roles = Role::get();
        // return view('admin.user.roleList',compact('roles'));
    }

    public function store(Request $request){

        return view('admin.user.createRole');
    }
    
    public function create(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'role' => 'required'
        ]);

        $data = array(
            'role' => $request->role,
            'status' => '1'
        );

        $create =   Role::create($data);
        // return redirect()->route('product.list')->with('success', 'Product added successfull.');
        // return view('admin.user.create');
    }
}
