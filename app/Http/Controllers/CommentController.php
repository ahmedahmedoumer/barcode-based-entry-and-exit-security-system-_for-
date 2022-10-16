<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Session;
use DB;

class CommentController extends Controller
{

    public function send( Request $request){


        $request->validate([
          'comment'=>'required|min:5|max:255',
        ]);

        try {
            DB::beginTransaction();

        $comment = new Comment();
        $comment->owner=Session::get('login_id.id');
        $comment->comment_content = $request->get('comment');
        $comment->status="new";
        $check=$comment->save();
        if ($check) {
          DB::commit();
          $comm_success="you are successfully send comment";
          Session::put('comment_success',$comm_success);
          return redirect('/give-comment');
        }
    } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error Occurred on commentcontroller.send";
 }
  }

  public function staff_give_comment(Request $request ){


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
        return redirect('/staff/give-comment');
      }
    } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error Occurred commentcontroller.staff_give_comment";
 }
    }

      public function student_comment( Request $request){

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
          return redirect('/student/give-comment');
      }
    } catch (\Throwable $th) {
        DB::rollBack();
        return "Something Error Occurred on commentcontroller.student_comment";
 }

    }

    public function reply_comment(Request $request, $id) {


                $msg= new comment();
                $count=$msg->count();
                $data=$msg->all();
                $request->session()->put('msg',$data);
                 $request->validate([
                 'reply_comment'=>'required']);

            try {
                DB::beginTransaction();

            $reply=DB::table('comments')->where('id',$id)->update(['reply'=>$request->reply_comment]);
            if($reply){
              DB::commit();
                $message="you are successfully reply to this comment.";
                return view('admin.show_messages')->with('reply_success',$message);
            }
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollBack();
            return "Something Error Occurred on commentcontroller.reply";
     }
    }
}
