<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;

class activate_login extends Controller
{
  public function activate_login(Request $request){


        $request->validate([
           'username' => 'required',
           'password' => 'required',
           'verify' => 'required',
        ]);
        try {
       $verification = $request->verification_code;
       $username=$request->username;
       $password=$request->password;
       DB::beginTransaction();
       $check=DB::table('listofuser')
       ->where('username', $username)
       ->where('password', $password)
       ->where('verification',$verification)->get();
       if($check){
        $verify= DB::table('users')
        ->where('username', $username)
        ->where('password',$password)
        ->update(['status' =>"approved"]);
        if($verify){
          $request->session()->flash('verification_success', "you are successfully verified your account you can login");
            return view ('/login');
       }
       $request->session()->flash('failed_verified', "Failed to verify");
       return view ('view.activate_login');
    }
    $request->session()->flash('failed_verified', "Failed to verify");
    return view ('view.activate_login');

 } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error Occurred";
 }
}
}
