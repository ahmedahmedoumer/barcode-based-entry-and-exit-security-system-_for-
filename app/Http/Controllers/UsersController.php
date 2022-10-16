<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_detail;
use App\Models\timeRestriction;
use App\Models\users;
use App\Models\weekly_absent;
use App\Models\yearly_absent;
use App\Models\monthly_absent;
use App\Models\record;
use Carbon\Carbon;
use Session;
use App\Models\weekly_absents;
use Auth;
use DB;
class UsersController extends Controller
{
    public function show(){

        try {
      $data=DB::table('users')->join('user_details', 'users.id','=','user_details.user_id')->simplePaginate(15);
    //   $data=DB::table('user_details')->simplePaginate(15);
        return view('admin.listOfUsers')->with('data',$data);

         } catch (\Throwable $th) {
         return "Something Error Occurred on usersController.show";
 }
    }
    public function profile(){
        // return "hello world";

        try {
            DB::beginTransaction();


          $id= Auth::id();
          $get_data= DB::table('user_details')->where('id',$id)->get();
          return view('admin.profile')->with('profile',$get_data);
             } catch (\Throwable $th) {
                DB::rollBack();
            return "Something Error Occurred on userscontroller.profile";
     }
    }
    public function set_time(){

        try {
            DB::beginTransaction();


        $time=timeRestriction::all()->last();
        return view('admin.setTimeRestriction')->with('time',$time);

          } catch (\Throwable $th) {
             DB::rollBack();
             return "Something Error Occurred userscontroller.settime";
       }
       }
    public function updated_time(request $request){


        $request->validate([
            'exitTime'=>'required',
            'entryTime'=>'required'
        ]);

        try {
            DB::beginTransaction();


       $owner=Session::get('login_id');
       foreach($owner as $owner){
        $owner_id=$owner->id;
       }
        
        $exit_time=$request->exitTime;
        $entry_time=$request->entryTime;
        $time=new timeRestriction();
        $time->user_id=$owner_id;
        $time->entry_time=$entry_time;
        $time->exit_time=$exit_time;
        $check= $time->save();
        if ($check){
            DB::commit();
            $time=timeRestriction::all()->last();
            $message="you are successfully setTime";
            session()->put('setTime',$message);
            return view('admin.setTimeRestriction')->with('time',$time);;
        }
        return redirect()->back();

          } catch (\Throwable $th) {
            DB::rollBack();
            return "Something Error Occurred on userscontroller.updated_time";
            }
    }

    public function attend_user( request $request){



         try {
            DB::beginTransaction();


       $date=now()->format('Y-m-d');
       $owner=$request->session()->get('login_id');
       foreach($owner as $user){
        $owner_id=$user->id;
       }
       $owner=$owner_id;
       $attend_before=DB::table('attendance')->where('date', $date)->count();
       if ($attend_before != 0) {
        DB::rollBack();
         return view('admin.detect_absents')->with('error_message'," Sorry you are attend before !!");
        }

        $day = now()->englishDayOfWeek;
        $week = now()->format('d');
        $month = now()->englishMonth;
        $week = "";
        switch (now()->daysInMonth) {
            case 1 || 2 || 3 || 4 || 5 || 6 || 7:
                $week = "week1";
                break;
            case 8 || 9 || 10 || 11 || 12 || 13 || 14:
                $week = "week2";
                break;
            case 15 || 16 || 17 || 18 || 19 || 20 || 21:
                $week = "week3";
                break;
            case 22 || 23 || 24 || 25 || 26 || 27 || 28 || 29 || 30:
                $week = "week4";
            }
        if ($day == 'Monday') {
            DB::table('weekly_absents')->update(
                [
                    'Monday' => 0,
                    'Tuesday' => 0,
                    'Wednesday' => 0,
                    'Thursday' => 0,
                    'Friday' => 0,
                    'Saturday' => 0,
                    'Sunday' => 0,
                    'total' => 0,
                ]
            );
        }

        $left = DB::table('users')
        ->join('weekly_absents', 'users.id', '=', 'weekly_absents.user_id')
        ->join('yearly_absents', 'users.id', '=', 'yearly_absents.user_id')
        ->select('users.id')
        ->join('monthly_absents', 'users.id', '=', 'monthly_absents.user_id')
        ->join('attendance_detail', 'users.id', '=', 'attendance_detail.user_id')
        ->where('attendance_detail.status', "out")
        ->get();
     $count_left=$left->count();
     $message  = "successfully attended ";
     $active = "active";

    foreach ($left as $title) {
        $data = $title->id;
        DB::table('weekly_absents')->where('user_id', $data)->update([$day => 1]);
        DB::table('yearly_absents')->where('user_id', $data)->increment($month, 1);
        DB::table('monthly_absents')->where('user_id', $data)->increment($week, 1);

        $total = db::table('weekly_absents')->select('user_id', DB::raw('Monday + Tuesday + Wednesday + Thursday +Friday + Saturday + Sunday as total'))->get();
        $total_left = DB::table('yearly_absents')->select('user_id', DB::raw('September + October + November + December +January + February + March + April + May + June +July + Augest as year_total'))->get();
        foreach ($total_left as $total_left) {
            DB::table('yearly_absents')->where('user_id', $total_left->user_id)->update(['total' => $total_left->year_total]);
        }

        foreach ($total as $tot) {
                DB::table('weekly_absents')->where('user_id', $tot->user_id)->update(['total' => $tot->total]);
        }
       }

       $request->session()->flash('detect_absents', $message);
    //    $attendance= array('date'=>$date,'status'=>'yes','owner'=>$owner,'created_at'=>$date);
       $check=DB::table('attendance')->insert(['date'=>$date,'status'=>"yes",'owner'=>$owner,'created_at'=>$date]);

      if ($check) {
        DB::commit();
        return view('admin.detect_absents');
      }

  

      } catch (\Throwable $th) {
         DB::rollBack();
        return "Something Error Occurred on userscontroller.attenduser";
}

}

public function send_Request(Request $request){

       try {
        DB::beginTransaction();



    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'username' => 'required',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'
    ]);
        $fname=$request->first_name;
        $lname=$request->last_name;
        $username=$request->username;
        $password=$request->password;
        $email=$request->email;
        $id=$request->id;
        $role=$request->role;

        $user= new users();
        $user_detail= new user_detail();
        $user->username=$username;
        $user->password=$password;
        $user->role=$role;
        $user->status="request";
        $check1=$user->save();
        if($check1){
            $user_id=users::where(['username'=>$user->username,'password'=>$user->password])->first();
        }
        $user_detail->user_id=$user_id->id;
        $user_detail->id_number=$id;
        $user_detail->email=$email;
        $check2=$user_detail->save();

        if($check1 && $check2){
            DB::commit();
            Session::put('send_request'," You are successfully send request ");
            return redirect('/create_new_account');
        }
            DB::rollBack();
            Session::put('send_request_fail'," Something error please try again");
            return redirect('/create_new_account');

        } catch (\Throwable $th) {
            DB::rollBack();
            return "Something Error Occurred userscontroller.send_request";
     }
}

public function detail_register(Request $request){
 
    $request->validate([
   'f_name' => 'required',
   'l_name' => 'required',
   'id_number' => 'required|unique:user_details',
   'phone_no' => 'required|regex:/^[0-9]+$/',
   'email' => 'required|email',
   'image' => 'file|mimes:jpeg,png,jpg,gif'
    ]);

    try {
        DB::beginTransaction();
       
    $user_image="NULL";
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('users'), $imageName);
        $user_image="/users/".$imageName;
    }
 
    $random_password=sprintf("%06d", mt_rand(1, 999999));
    $created_at=Carbon::now()->format('Y-m-d');
    $user_data=array('username'=>$request->id_number,'password'=>$random_password,
            'status'=>"request",'role'=>$request->role);
    $users=DB::table('users')->insert($user_data);
    if ($users) {
       $detail=array('user_id'=>users::max('id'),'id_number' => $request->id_number,
               'department' =>$request->department,'f_name' =>$request->f_name,'l_name' =>$request->l_name,
               'Batch' =>$request->batch,'section' =>$request->section,'sex'=>$request->gender,
               'phone_no' =>$request->phone_no,'email' =>$request->email,'image' =>$user_image);
      $user_detail=DB::table('user_details')->insert($detail);
            $report_array=array('user_id'=>users::max('id'));
          DB::table('attendance_detail')->insert($report_array);
          DB::table('weekly_absents')->insert($report_array);
          DB::table('monthly_absents')->insert($report_array);
          DB::table('yearly_absents')->insert($report_array);
      
    }
    if($user_detail){
        $request->session()->flash('success_registred',"You are successfully registered");
        DB::commit();
        return redirect('/Register-user-detail');

    }
        $request->session()->flash('failed_registred',"You are failed to register");
        DB::rollBack();
        return redirect('/Register-user-detail');
    } catch (\Throwable $th) {
        DB::rollBack();
        $request->session()->flash('failed_registred',"Something Error Occurred userscontroller.detailregister");
        return redirect('/Register-user-detail');
 }
}
public function Make_report(Request $request, $schedule){


    try {
        DB::beginTransaction();


   $report=null;
   if ($schedule=='weekly') {
    $report=DB::table('weekly_absents')->join('user_details', 'weekly_absents.user_id', 'user_details.user_id')->where('total','!=',0)->get();
    session::flash('report',$report);
    session::flash('schedule',"weekly");
    return view('/admin.make_report');

   }
   else if ($schedule=='monthly') {
    $report=DB::table('monthly_absents')->join('user_details', 'monthly_absents.user_id', 'user_details.user_id')->where('total','!=',0)->get();
    session::flash('report',$report);
    session::flash('schedule',"Monthly");
    return view('/admin.make_report');


   }
   else if ($schedule=='yearly') {
    $report=DB::table('yearly_absents')->join('user_details', 'yearly_absents.user_id', 'user_details.user_id')->where('total','!=',0)->get();
    session::flash('report',$report);
    session::flash('schedule',"yearly");
    return view('/admin.make_report');
}
       session::flash('report',"Sorry Sir , There is not have available report now !!");
        return view('/admin.make_report');

     } catch (\Throwable $th) {
         DB::rollBack();
         return "Something Error Occurred on userscontroller.make_report";
}
}


 public function showRecord(){

    try {
        DB::beginTransaction();


    $id= session::get('login_id');
    foreach($id as $record){
    $check=record::where('user_id',$record->id)->first();
    if ($check!=null) {
        return view('student.show_record');
    }
    return view('student.show_record')->with('fail_msg', "you have not any guilty");
   }

   } catch (\Throwable $th) {
       DB::rollBack();
       return "Something Error Occurred userscontroller.showrecord";
}
}
}
