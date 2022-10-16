<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_detail;
use Session;
use Carbon\Carbon;
use DB;

class control extends Controller
{
    //
    public function make_control( Request $request){


        $request->validate([
            'id' => 'required|max:255',
        ]);


        try {
            DB::beginTransaction();
        $getwaytype=$request->getway;
        $id=$request->id;

        $result = substr($id, 0, 3);
        if($result=="S/N"){
            $pcdata=DB::table('laptop_owner')->where('serial_number',$id)->first();
            if ($pcdata) {
                       return view('/guard.make_control')->with('laptop_owner',$pcdata)->with('allow',"This PC is registered on the user below");
                      }
                      else {
                        return view('/guard.make_control')->with('laptop_owner',$pcdata)->with('ignore',"This PC is not registered");
                      }
                  }
            // $user_detail=new user_detail();
            $data=user_detail::where('id_number',$id)->first();
            if ($data) {
                if ($getwaytype==1) {
                      $attendance=DB::table('make_attendance')->where('id_number',$id)->first();
                      if ($attendance) {
                        $get_time_before=$attendance->get_out_time;
                        $status=$attendance->status;
                        $message = ($status!="here") ? 1:0;
                        if ($message==0) {
                                   return view('/guard.make_control')->with('ignore',"You Are get out in the fence.!!");
                        }
                        $current_time=Carbon::now();
                        $update_time=DB::table('make_attendance')
                                    ->where('id_number',$id)
                                    ->update(['get_in_time'=>$current_time,
                                      'status'=>"here"]);
                                      DB::commit();
                                      return view('/guard.make_control')->with('user_data',$data)->with('allow',"You can get in");
                      }
                      else{
                        DB::rollBack();
                        return view('/guard.make_control')->with('ignore',"Sorry sir, You Are approved You will be contact an admin!!");

                      }
                }
                else {
                    $attendance=DB::table('make_attendance')->where('id_number',$id)->first();
                    if ($attendance) {
                      $get_time_before=$attendance->get_in_time;
                      $status=$attendance->status;
                      $message = ($status=="here") ? 1:0; 
                      if ($message==0) {
                                 return view('/guard.make_control')->with('ignore',"You Are get in the fence.!!");
                         }
                      $current_time=Carbon::now();
                      $update_time=DB::table('make_attendance')
                                  ->where('id_number',$id)
                                  ->update(['get_out_time'=>$current_time,
                                    'status'=>"out"]);
                                    DB::commit();
                                    return view('/guard.make_control')->with('user_data',$data)->with('allow',"You can get out");
                    }
                }
            }
            else {
                  return view('/guard.make_control')->with('ignore',"You Are Not Register before. Please Go Back !!");

            }
            } catch (\Throwable $th) {
                DB::rollBack();
                return "Something Error Occurred control.make_control";
         }
            }
    public function make_attendance(Request $request){

    //     try {
    //         DB::beginTransaction();

    //    $date=now()->format('Y-m-d');
    //    $owner=$request->session()->get('login_id');
    //    foreach($owner as $value){
    //    $owner=$value->id;
    //    $attend_before=DB::table('attendance')->where('date', $date)->count();
    //    if ($attend_before == 0) {

    //     $day = now()->englishDayOfWeek;
    //     $week = now()->format('d');
    //     $month = now()->englishMonth;
    //     $week = "";
    //     switch (now()->daysInMonth) {
    //         case 1 || 2 || 3 || 4 || 5 || 6 || 7:
    //             $week = "week1";
    //             break;
    //         case 8 || 9 || 10 || 11 || 12 || 13 || 14:
    //             $week = "week2";
    //             break;
    //         case 15 || 16 || 17 || 18 || 19 || 20 || 21:
    //             $week = "week3";
    //             break;
    //         case 22 || 23 || 24 || 25 || 26 || 27 || 28 || 29 || 30:
    //             $week = "week4";
    //         }
    //     if ($day == 'Monday') {
    //         DB::table('weekly_absents')->update(
    //             [
    //                 'Monday' => 0,
    //                 'Tuesday' => 0,
    //                 'Wednesday' => 0,
    //                 'Thursday' => 0,
    //                 'Friday' => 0,
    //                 'Saturday' => 0,
    //                 'Sunday' => 0,
    //                 'total' => 0,
    //             ]
    //         );
    //     }

    //     $left = DB::table('users')
    //     ->join('weekly_absents', 'users.id', '=', 'weekly_absents.user_id')
    //     ->join('yearly_absents', 'users.id', '=', 'yearly_absents.user_id')
    //     ->select('users.id')
    //     ->join('monthly_absents', 'users.id', '=', 'monthly_absents.user_id')
    //     ->join('attendance_detail', 'users.id', '=', 'attendance_detail.user_id')
    //     ->where('attendance_detail.status', "left")
    //     ->get();
    //  $count_left=$left->count();
    // $message  = array('success'=>"successfully attended ");
    // $active = "active";
    // foreach ($left as $title) {
    //     $data = $title->id;
    //     DB::table('weekly_absents')->where('user_id', $data)->update([$day => 1]);
    //     DB::table('yearly_absents')->where('user_id', $data)->increment($month, 1);
    //     DB::table('monthly_absents')->where('user_id', $data)->increment($week, 1);

    //     $total = db::table('weekly_absents')->select('user_id', DB::raw('Monday + Tuesday + Wednesday + Thursday +Friday + Saturday + Sunday as total'))->get();
    //     $total_left = DB::table('yearly_absents')->select('user_id', DB::raw('September + October + November + December +January + February + March + April + May + June +July + August as year_total'))->get();
    //     foreach ($total_left as $total_left) {
    //         DB::table('yearly_absents')->where('user_id', $total_left->user_id)->update(['total' => $total_left->year_total]);
    //     }

    //     foreach ($total as $tot) {
    //             DB::table('weekly_absents')->where('user_id', $tot->user_id)->update(['total' => $tot->total]);
    //     }
    //    }
    //    $request->session()->flash('detect_absents', $message);

    //    $check=DB::table('attendance')->insert(['date'=>$date,'status'=>"yes",'owner'=>$owner,'created_at'=>$date]);

    //    if ($check) {
    //     return view('guard.message')->with('error_message' ," Sorry you are attend before !!");
    //    }


    //    return "true";
    //    $attendance= array('date'=>$date,'status'=>'yes','owner'=>$owner,'created_at'=>$date);
    //    DB::table('attendance')->insert($attendance);


//    }
//    return view('guard.message')->with('error_message'," Sorry you are attend before !!");
//        }
//     } catch (\Throwable $th) {
//         DB::rollBack();
//         return "Something Error Occurred on control.make_attendance";
//  }
}
}

