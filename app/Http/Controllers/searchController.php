<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class searchController extends Controller
{
    //
    public function search(Request $request){

        try {
          //  DB::beginTransaction();

        if($request->ajax())
       {
        // return "hello";
         $output="";
         $products=DB::table('users')->join('user_details', 'users.id', 'user_details.user_id')
                      ->where('username','LIKE','%'.$request->search."%")
                      ->orWhere('username','like','%'.$request->search.'%')
                      ->orWhere('status','like','%'.$request->search.'%')
                      ->orWhere('role','like','%'.$request->search.'%')
                      ->orWhere('f_name','like','%'.$request->search.'%')->get();
         if($products)
           {
           foreach ($products as $key => $result) {
              $output.='<tr>'.
               '<td>'.$result->id.'</td>'.
               '<td>'.$result->username.'</td>'.
               '<td>'.$result->role.'</td>'.
               '<td>'.$result->status.'</td>'.
               '<td><a class="btn btn-primary" name="update" id="update" href="/update/{{$result->id}}">update</a></td>'.
               '<td><a class="btn btn-danger"  name="update" id="update" href="/deactive/{{$result->id}}" >deactive</a></td>'.
               '</tr>';
                }
                 return Response($output);
                }
             }
            } catch (\Throwable $th) {
                // DB::rollBack();
                return "Something Error Occurred on searchcontroller.search";
            }
      }
    }
