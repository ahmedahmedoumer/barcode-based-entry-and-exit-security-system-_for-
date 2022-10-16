<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class give_record extends Controller
{
    public function give_record(Request $request,$id){
         try {
       $description=$request->get('message');
       $record=DB::table('records')->insert([
       'user_id'=>$id,
       'record'=>"yes",
       'description'=>$description,
       'created_at'=>now(),
       'updated_at'=>now(),
    ]);
       if ($record) {
       return redirect()->back();
       }

      } catch (\Throwable $th) {
             return "Something Error Occurred on give_record.give_record";
       }
    }
}
