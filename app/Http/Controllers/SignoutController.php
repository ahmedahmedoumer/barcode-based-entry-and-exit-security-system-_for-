<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
class SignoutController extends Controller
{
    //
    public function logout(Request $request){
        try {
            DB::beginTransaction();
        $request->session()->flush();
        return redirect('/login');

       } catch (\Throwable $th) {
           DB::rollBack();
        return "Something Error Occurred on signout.signout";
 }
    }
}
