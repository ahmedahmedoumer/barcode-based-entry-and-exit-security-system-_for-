<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class update_profile extends Controller
{
    //
    public function update_profile(Request $request){



        $request->validate([
            'username' => 'required|max:50|min:4',
            'password' => 'min:4|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:4',
            'email' => 'required|email',
            'phone_no'=>'required|regex:/^[0-9]+$/',
        ]);


        try {
            DB::beginTransaction();

          $check=DB::table('users')
          ->where('username', '=', $request->username)
          ->where('password', '=', $request->password)
          ->first();
          if ($check) {
            $validator="your username or password already Exist please change another and try again.";
             return view('guard.update_profile')->with('validator',$validator);
           }
           $login_id=Session::get('login_id');
           foreach($login_id as $login){
            $id=$login->id;
            $update=DB::table('users')
            ->where('id',$id)->update([
             'username'=>$request->username,
             'password'=>$request->password,
            ]);
            $update2=DB::table('user_details')
            ->where('user_id',$id)->update([
                'email'=>$request->email,
                'phone_no' =>$request->phone_no
            ]);

          if ($update && $update2) {
              $validator="You are successfully updated your profile";
              return redirect()->action('/login');
          }
           }

           } catch (\Throwable $th) {
               DB::rollBack();
               return "Something Error Occurred on update_profile.update_profile";
     }
    }
}
