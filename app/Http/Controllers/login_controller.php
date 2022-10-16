<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;
use App\Models\news;
use App\Models\users;
use App\Models\record;
use App\Models\timeRestriction;
use Session;
use DB;
class login_controller extends Controller
{
    //
    public function index(Request $request){



        $request->validate([
            'username' => 'required',
            'password' => 'required|max:255',
            'role' => 'required',
        ]);

        // try {
        //     DB::beginTransaction();

        // $validator=$request->only('password', 'username');
        $username=$request->get('username');
        $password=$request->get('password');
        $role=$request->get('role');

        $user=users::where(['username'=>$username,'password'=>$password,'role'=>$role,'status'=>"approved"])->first();
        if($user) {
            $users=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where(['users.id'=>$user->id])->first();

            $listOfUsers=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where('role','!=',1)->get();
            // if(Hash::check($password,$user->password)){
                if($user->role == '1') {
                $request->session()->flush();
                $request->Session()->regenerate();
                $msg= new comment();
                $count=$msg->count();
                $data=$msg->all();
                $news_=news::orderBy("created_at", "desc")->get();
                $news_count=news::all()->count(); DB::rollBack();
                $request_data=users::where('status','request')->get();
                $request_count=news::all()->count();
                $request->session()->put('request_data',$request_data);
                $request->session()->put('listOfUsers',$listOfUsers);
                $request->session()->put('notification_count',$request_count);
                $request->session()->put('count', $count);
                $request->session()->put('msg',$data);
                $request->Session()->put('news',$news_);
                $request->Session()->push('login_id',$users);

                return view('/admin/dashboard');
        }
        else if($user->role=='2'){
            $request->session()->flush();
            $request->Session()->regenerate();
            $users=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where(['users.id'=>$user->id])->first();
            $reply=DB::table('comments')->where('owner',$users->id)->get();
            $time_restriction=new timeRestriction();
            $time_set=$time_restriction->latest('id')->first();
            $time=$time_set->created_at;
            $news=new news();
            $counts=$news->count();
            $news_=$news->all();
            $request->session()->push('time_set',$time_set);
            $request->session()->put('time_sets',$time_set);
            $request->session()->push('login_id',$users);
            $request->Session()->put('news',$news_);
            $request->Session()->put('counts',$counts);
            $request->Session()->put('reply',$reply);

            return view('/guard/security_guard');
        }
        else if($user->role=='3'){
            $users=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where(['users.id'=>$user->id])->first();
            $request->session()->flush();
            $request->Session()->regenerate();
            $news=new news();
            $counts=$news->count();
            $news_=$news->all();
            $request->session()->push('login_id',$users);
            $request->Session()->put('news',$news_);
            $request->Session()->put('counts',$counts);
            return view('staff.staff');
        }
        else if($user->role=='4'){
            $users=DB::table('users')->join('user_details','users.id','=','user_details.user_id')
            ->where(['users.id'=>$user->id])->first();
            $request->session()->flush();
            $request->Session()->regenerate();
            $check=record::where('user_id',$user->id)->first();
            $news=new news();
            $counts=$news->count();
            $news_=$news->all();
            $request->session()->push('login_id',$users);
            $request->session()->push('record',$check);
            $request->Session()->put('news',$news_);
            $request->Session()->put('counts',$counts);
            return view('/student.student');
        }





    }
    else{
        return view('/login')->with('login_error','please fill correct username or password and try again  !!');
    }
}
}
