<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function makeLogin(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        );
        
        // dd($adminUser);
        if(Auth::attempt($data)){
            $adminUser = User::join('roles','roles.id','=','users.role_id')->where('email', $request->email)->first(['users.*','roles.role']);
            if($adminUser){
                Session::put('status', true);
                Session::put('admin_id', $adminUser->id);
                Session::put('admin_name', $adminUser->name);
                Session::put('admin_role', $adminUser->role);
                return redirect()->route('admin.dashboard');
            }else{
                return back()->withErrors(['message'=>'Invalid email or password']);
            }
            
        }else{
            return back()->withErrors(['message'=>'Invalid email or password']);
        }
    }
    public function logout(){
        Auth::logout();
        session()->forget('id');
        session()->forget('admin_name');
        session()->forget('email');
        return redirect()->route('admin.login');
    }
}
