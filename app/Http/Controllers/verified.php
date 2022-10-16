<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class verified extends Controller

{
    //
    public function verified(Request $request){





        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'verify' => 'required',
         ]);


         try {
            DB::beginTransaction();
        //  return $request->username;
        $verification = $request->verification_code;
        $username=$request->username;
        $password=$request->password;
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
     $request->session()->flash('failed_verified', "Failed to verify please feel correct verification code or ");
     return view ('view.activate_login');

      } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error Occurred verified.verified";
 }
    }
}
