<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    function check(Request $request){
        // validation
        $request->validate([
            'email'=> 'required|email|exists:doctors,email',
            'password'=>'required|min:5|max:12'
        ]);
        $creds = $request->only('email', 'password');
        if(Auth::guard('doctor')->attempt($creds)){
            return redirect()->route('doctor.home');
        }else{
            return redirect()->back()->with('fail', 'Entered wring credential');
        }
    }
    function save(Request $request){
        $request->validate([
            'name'=> 'required',
            'phone'=> 'required|string',
            'email'=> 'required|unique:doctors,email',
            'password'=>'required|min:5|max:12'
        ]);
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->password = \Hash::make($request->password);
        $save = $doctor->save();
        if($save){
            return redirect()->back()->with('success', "Registered Successfull.");
        }
        return redirect()->back()->with('success', "Registered Successfull.");
    }
    function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->to('/');
    }
}
