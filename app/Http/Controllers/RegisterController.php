<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){
        $states = State::all();
        $cities = City::all();

        return view('register',compact('states','cities'));
    }

    public function register(Request $request){

        $validation  = $request->validate([
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->save();
        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function loginIndex(){
        return view('login');
    }

    public function login(Request $request){
        $validation  = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->withSuccess('User Login Successfully');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login')->withSuccess('Logout Successfully');
    }

    public function city($state_id){
        $city = City::where('state_id',$state_id)->get();
        $response = [
            'data' => $city,
            'state_code' => 200,
            'msg' => 'city fetched successfully'
        ];
        return response($response);
    }
}
