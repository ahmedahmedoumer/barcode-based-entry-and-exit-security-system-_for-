<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laptop_details;
use DB;
use Session;

class laptop_controller extends Controller
{
    //
    public function pc_register(Request $request){



        $request->validate([
            'laptop_owner' =>'required',
            'laptop_detail' =>'required',
            'serial_number' =>'required|unique:laptop_details',
            'laptop_name'=>'required',
            'pc_image'=>'required',

        ]);

        try {
            $pc_image=null;
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('pc'), $imageName);
        $pc_image="/pc/".$imageName;
    }

      $check=DB::table('laptop_details')->insert([
            'laptop_name'=>$request->laptop_name,
            'laptop_detail'=>$request->laptop_detail,
            'owner_id'=>$request->laptop_owner,
            'serial_number'=>$request->serial_number,
            'laptop_image' =>$pc_image,
        ]);
        if ($check) {
            $msg="you are successfully registerd personal computer";
            $request->session()->flash('success',$msg);

            return view('admin.pcregister');
        }
           } catch (\Throwable $th) {
                  return "Something Error Occurred on laptop.pcregister";
           }

    }
        public function pc_register_page(Request $request){
                        try {

               $users=DB::table('users')->join('user_details','users.id','=','user_details.user_id')->get();
                   return view('admin.pcregister')->with('listOfUsers',$users);
            } catch (\Throwable $th) {
                return "Something Error Occurred on laptop.pc_register_page";
         }
        }
}
