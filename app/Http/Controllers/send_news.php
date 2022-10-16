<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\comment;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
class send_news extends Controller
{
    public function send_news(Request $request){
        // $user = auth()->id();//tabnine auto completion
        // $news = new comment();
        // $news=$news->all();
        // $msg_content = DB::table('comments')->get();
        // View::share('msg_content', $msg_content);



        $validate= $request->validate([
            'header' => 'required',
            'description' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg',
            'type' => 'required',
                   ]);

                   try {
                    DB::beginTransaction();


                $users = DB::table('comments')->count();
                   $filepath="/no_path";
                   if ($request->hasFile('file')) {
                       $filename = time() . '_' . $request->file('file')->getClientOriginalName();
                       $path = $request->file('file')->move(public_path('file'), $filename);
                       $filepath=$filename;
                   }
                   if($validate){
                     $news= new news();
                     $news->heading = $request->get('header');
                     $news->news_content =$request->get('description');
                     $news->file =$filepath;
                     $login_id=session::get('login_id');
                     foreach($login_id as $news_content) {
                        $login_id=$news_content->id;
                     }
                     $news->owner=$login_id;
                     $news->status="new";
                     $news->type=$request->type;
                     $check=$news->save();
                   }
                   if($check){
                    Session::flash('success', "successfully sent news");
                    return view('admin/send_news');
                   }
                   Session::flash('success', "failed to send news");
                   return view('admin/send_news')->with('count', $users);
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return "Something Error Occurred on send_news.send_news";
             }
    }
    public function view_public_news() {

        try {
            DB::beginTransaction();


      $news= new news();
      $new= news::where('type',"public")->get();
      return view('welcome')->with('news', $new);
      } catch (\Throwable $th) {
           DB::rollBack();
        return "Something Error Occurred on send_news.view_public_news";
   }
    }
    public function delete_news(Request $request,$id) {

        try {
            DB::beginTransaction();


        $delete = DB::table('news')->where('id', $id)->delete();
               $news_=news::orderBy("created_at", "desc")->get();
                $request_count=news::all()->count();
                $request->session()->put('notification_count',$request_count);
                $request->Session()->put('news',$news_);
        return redirect()->back();
       } catch (\Throwable $th) {
           DB::rollBack();
        return "Something Error Occurred on send_news.delete_news";
     }
    }
}
