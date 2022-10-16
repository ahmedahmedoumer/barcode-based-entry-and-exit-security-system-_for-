<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use DB;

class deactive extends Controller
{
    //
    public function deactive_user(Request $request,$id){
        try {

        $check=users::where('id',$id)->first();
        $check->status="deactive";
        $check->save();
        if ($check) {
            $listOfUsers=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where('role','!=',1)->get();
            $request->session()->put('listOfUsers',$listOfUsers);
            return redirect()->back();
        }
         } catch (\Throwable $th) {
            return "Something Error Occurred on deactive.deactive_user";
            }
       }
       public function active_user(Request $request,$id){
        try {
        $check=users::where('id',$id)->first();
        $check->status="approved";
        $check->save();
        if ($check) {
            $listOfUsers=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where('role','!=',1)->get();
            $request->session()->put('listOfUsers',$listOfUsers);
            return redirect()->back();
        }
         } catch (\Throwable $th) {
           return "Something Error Occurred on deactive.active_user";
         }
       }
       public function verify_user(Request $request,$id){
        try {

             $check=users::where('id',$id)->first();
             $check->status="approved";
             $check->save();
             if ($check) {
               $listOfUsers=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
               ->where('role','!=',1)->get();
               $request->session()->put('listOfUsers',$listOfUsers);
               return redirect()->back();
               }
            } catch (\Throwable $th) {
                 return "Something Error Occurred on deactive.verify_user";
            }
       }
       public function  update_user(Request $request,$id){
           try {

               $check=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
                          ->where('users.id','=',$id)->get();
        if ($check) {
           return view('admin/update')->with('update_user',$check);
         }
        return view('admin/update');

       } catch (\Throwable $th) {
           return "Something Error Occurred on deactive.update_user";
        }
       }
       public function update_users(Request $request,$id){
                   try {

           $request->validate([
        'username' => 'required',
        'password' => 'required',
        'f_name' => 'required',
        'l_name' => 'required',
        'id_number' => 'required',
        // 'department' => 'required',
        // 'batch' => 'required',
        // 'section' => 'required',
        // 'gender' => 'required',
        'phone_no' => 'required',
        'email' => 'required|email',
        // 'check_box' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

         ]);

         $user_image="/no_path";
         if ($request->hasFile('image')) {
             $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
             $path = $request->file('image')->move(public_path('images'), $imageName);
             $user_image="images/".$imageName;
         }

         $user_detail= DB::table('users')->join('user_details','users.id','=','user_details.user_id')
                          ->where('users.id','=',$id)->update([
         'username'=>$request->username,
         'password'=>$request->password,
         'f_name'=>$request->f_name,
         'l_name'=>$request->l_name,
         'id_number'=>$request->id_number,
         'department'=>$request->department,
         'Batch'=>$request->batch,
         'section'=>$request->section,
         'sex'=>$request->gender,
         'phone_no'=>$request->phone_no,
         'email'=>$request->email,
         'image'=>$user_image,
        ]);
         if($user_detail){
             session()->flash('success_registred',"You are successfully updated");
             return view('/admin/search_user');
         }
             session()->flash('failed_registred',"You are failed to update");
             return view('/admin/search_user');

             } catch (\Throwable $th) {
                return "Something Error Occurred deactive.update_users";
             }

       }
}
