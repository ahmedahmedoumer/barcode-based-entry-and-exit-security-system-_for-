<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Hash;
use DB;
class register extends Controller
{
    public function register(Request $request){



        $validate=$request->validate([
            'username' =>'required',
            'password' =>'required',
            'role'     =>'required'
        ]);

        try {
            DB::beginTransaction();

        $username=$request->get('username');
        $password=$request->get('password');
        $role=$request->get('role');

        $user= new users();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->role=$role;
        $check=$user->save();

        if(!$check){
            return response()->json(['message' => 'Incorrect username or Password'],302);
        }
        return response()->json(['message' => 'Successfully registered'],200);

       } catch (\Throwable $th) {
             DB::rollBack();
        return "Something Error Occurred on register.register";
       }
    }
}
