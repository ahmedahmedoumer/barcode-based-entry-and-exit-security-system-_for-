<?php

namespace App\Http\Controllers;
use File;
use DB;
use Response;

use Illuminate\Http\Request;

class download extends Controller
{
    //
    public function downloadFile($id,Request $request){

              try {

        $path="file/".$id;
        $filepath = public_path($path);
        return Response::download($filepath);

          } catch (\Throwable $th) {
            return "Something Error Occurred download.downloadfile";
           }
    }
}
