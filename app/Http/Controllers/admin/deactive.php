<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class deactive extends Controller
{
   public function deactive_user(Request $request,$id){
    return $id;
   }
}
