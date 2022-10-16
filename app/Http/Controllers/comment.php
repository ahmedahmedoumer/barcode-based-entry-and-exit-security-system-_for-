<?php

namespace App\Http\Controllers;
use App\Models\comment;
use Illuminate\Http\Request;
use session;
use DB;
class comment extends Controller
{
    //
    public function send( Request $request){


          $request->validate([
            'comment'=>'required|min:5|max:255',
          ]);

          try {
            DB::beginTransaction();

          $comment = new Comment();
          $comment->owner=session::get('login_id.id');
          $comment->content = $request->get('comment');
          $comment->status="new";
          $check=$comment->save();
          if ($check) {
            DB::commit();
            $comm_success="you are successfully send comment";
            session::put('comment_success',$comm_success);
            return redirect('/give-comment');
          }

        } catch (\Throwable $th) {
            DB::rollBack();
            return "Something Error Occurred in comment cont...";
     }
    }
}
