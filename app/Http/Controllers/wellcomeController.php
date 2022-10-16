<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Session;
use DB;

class wellcomeController extends Controller
{
    //
    public function wellcome(){
        try {
            DB::beginTransaction();


           $news = new news();
           $users = news::where('type', 'public')->paginate(2);
           if ($users) {
           return view('view_news', ['news' => $users]);
           }
           else{
            return redirect()->back();
           }
        } catch (\Throwable $th) {
               DB::rollBack();
               return "Something Error Occurred wellcome.wellcome";
     }

    }
}
