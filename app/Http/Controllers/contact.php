<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class contact extends Controller
{
    //
    public function save_contact(Request $request){

        $request->validate([
            'txtName' =>'required',
            'txtEmail' =>'required',
            'txtPhone' =>'required',
            'txtMsg' => 'required'
    ]);

    try {
        DB::beginTransaction();

    $name=$request->get('txtName');
    $name=$request->get('txtEmail');
    $name=$request->get('txtPhone');
    $name=$request->get('txtMsg');
    $data=array('name'=>$request->get('txtName'), 'email'=>$request->get('txtEmail'), 'phone_no'=>$request->get('txtPhone'), 'messages'=>$request->get('txtMsg'));
    $insert=DB::table('contact')->insert($data);
    if ($insert){
        DB::commit();
         session()->flash('success_contact','You are successfully added to the contact, Thanks for your support!!');
         return redirect()->back();
    }
} catch (\Throwable $th) {
    DB::rollBack();
    return "Something Error Occurred on contact.save_contact";
}
}
}
