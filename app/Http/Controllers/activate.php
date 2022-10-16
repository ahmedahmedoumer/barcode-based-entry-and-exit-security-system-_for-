<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Mail;
use App\Mail\DemoMail;

class activate extends Controller
{
    //
public function activate_account(request $request){

    try {
        DB::beginTransaction();

        $users = DB::table('listofuser')->where(['username'=>$request->username,
               'password'=>$request->password,'email'=>$request->email])->first();
 if ($users) {
    $users->verification=sprintf("%06d", mt_rand(1, 999999));
    $verify= DB::table('listofuser')->where('username', $users->username)
                                    ->where('password',$users->password)
                                    ->update(['verification' =>$users->verification]);
    if ($verify) {
            Mail::to($users->email)->send(new DemoMail($users));
            // return response()->json(['success'=>'Send email successfully.']);

            $request->session()->flash('success_verify', "the verification code is sent to your email address");
            return view('view.activate_login');
        }
        $request->session()->flash('fail_verified', "the verification code not sent to your email please try again");
        return view('view.activate_account');
    }
        $request->session()->flash('fail_verified', "the email address are not yours or invalid");
        return view('view.activate_account');
    } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error activate cont...";
 }

    }

}
