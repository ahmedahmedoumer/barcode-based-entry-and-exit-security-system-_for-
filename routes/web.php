<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\register;
use App\Http\Controllers\control;
use App\Http\Controllers\send_news;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\download;
use App\Http\Controllers\activate;
use App\Http\Controllers\activate_login;
use App\Http\Controllers\deactive;
use App\Http\Controllers\verified;
use App\Http\Controllers\searchController;
use App\Http\Controllers\wellcomeController;
use App\Http\Controllers\contact;
use App\Http\Controllers\give_record;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\laptop_controller;
use App\Http\Controllers\update_profile;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
            return view('welcome');
        });
Route::any('download/{id}', [download::class,'downloadFile']);
Route::post('/get-verification-code', [activate::class, 'activate_account'])->name('/get-verification-code');
Route::get('/activate-account', function (Request $request){
    return view('view.activate_account');
});
Route::get('/News', [wellcomeController::class,'wellcome']);
route::post('send_verification_code',  [verified::class,'verified']);  //verify the verification code
Route::get('/login',function(){
    return view('login');
});
Route::post('/login_data',[ login_controller::class, 'index']);





Route::group(['middleware' => 'authentication'], function () {    //create middleware authentication





// Route::any('/verification' , [activate_login::class,'activate_login']);      //verify the verification code
Route::post('/update-admin-profile',[update_profile::class,'update_profile']);
Route::get('/admin-update-profile-page', function(){
         return view('admin.update_profile');
})->name('/admin-update-profile-page');
// Route::post('/view-detail/{id}',
Route::any('search', [searchController::class,'search'])->name('search')->Middleware('authentication');
Route::get('/dashboard', function () {
    return view('/admin/dashboard');
});
Route::get('/print-page',function(){
     return view('/print');
});
Route::get('/contact',function(){
    return view('/contact');
});
Route::post('/submit-contactform',[contact::class,'save_contact']);
// Route::get('/welcome/News', [send_news::class, 'view_public_news']);
Route::get('/create_new_account',function(){
   return view('main.register');
})->name('/create_new_account');
Route::post('/send_Request', [UsersController::class,'send_Request']);
Route::get('/deactive/{id}', [deactive::class,'deactive_user'])->name('deactive');
Route::get('/active/{id}', [deactive::class,'active_user'])->name('active');
Route::get('/verify_user/{id}', [deactive::class,'verify_user'])->name('verify_user');
Route::get('/update/{id}', [deactive::class,'update_user'])->name('update');
Route::post('/update-user/{id}', [deactive::class,'update_users'])->name('update-user');
Route::post('/Generate_report/give_record/{id}', [give_record::class, 'give_record'])->name('give_record');
Route::get('/admin/register',function(){
    return view('/admin/register');
});
Route::post('/register',[register::class, 'register']);
Route::get('/send_news',function(){
   return view('admin/send_news');
});
Route::post('/posting_news', [ send_news::class, 'send_news']);
// route::get('/messages', [CommentController::class, 'show']);
route::get('/all-messages', function(){
      return view('/admin/show_messages');
    })->name('/all-messages');

    Route::post('/reply_comment/{id}', [CommentController::class,'reply_comment']);  //for replying comment
    route::get('/all-notification', function(){
        return view('/admin/show_notification');
      })->name('/all-notification');
Route::get('/delete-news/{id}', [send_news::class, 'delete_news'])->name('/delete-news');
route::get('/users-profile', [UsersController::class, 'show']);
route::get('/signout', [SignoutController::class, 'logout']);
route::get('/search-user',function (){
    return view('admin.search');
});
route::get('/users-profile', [ UsersController::class,'profile']);
route::get('/users-list', [ UsersController::class,'show']);
route::get('/pc-register', [laptop_controller::class, 'pc_register_page']);
//     return view('/admin.pcregister');

// })->name('/pc-register');
route::post('/register-pc-info', [laptop_controller::class,'pc_register']);
route::get('/Set-time', [ UsersController::class,'set_time']);
route::post('/Set_times', [ UsersController::class,'updated_time']);
route::get('/attend-user',[ UsersController::class,'attend_user']);
route::get('/Register-user-detail',function(){
     return view('/admin.register_user_detail');
})->name('/Register-user-detail');

Route::post('/detail-register', [UsersController::class,'detail_register'])->name('detail-register');
Route::get('/search-users', function(){
    return view('/admin.search_user');
})->name('search-users');
Route::get('/Generate_report/{schedule}', [UsersController::class,'Make_report'])->name('/Generate_report');
// function(){
//     return view('admin/send_news');
// })->name('posting_news');




Route::post('/update-guard-profile', [update_profile::class, 'update_profile'])->name('update_guard_profile');
Route::get('/guard/update-profile', function(){
       return view('/guard.update_profile');
})->name('guard.update-profile');
Route::get('guard/show-reply', function(){
      return view('guard.show_reply');
})->name('show-reply');
Route::get('/guard/show_news', function() {
    return view('guard.show_notification');
})->name('guard.show_news');
Route::get('/guard-dashboard', function(){
     return view('guard.security_guard');
});
Route::get('/view-profile', function (){
     return view('guard.view_profile');
});
Route::get('/give-comment', function (){
     return view('guard.give_comment');
     });
Route::post('/send-comment' , [CommentController::class,'send']);
Route::get('/control', function (){
        return view('guard.make_control');
});
Route::post('/control-check',[ control ::class,'make_control']);
Route::get('/make-attendance', [control ::class,'make_attendance']);









///staff
Route::post('/update-staff-profile',[update_profile::class,'update_profile']);
Route::get('/staff-update-profile-page', function(){
         return view('staff.update_profile');
})->name('/staff-update-profile-page');

Route::get('/staff/view_profile', function(){
         return view('staff.view_profile');
});
Route::get('/staff/give-comment', function(){
    return view('/staff.give_comment');
})->name('staff.give_comment');
Route::get('/staff/show-notification',function(){
    return view('staff.show_notification');
});
Route::get('/staff/send-comment', [CommentController::class,'staff_give_comment'])->name('staff.send_comment');



////student
Route::post('/update-student-profile',[update_profile::class,'update_profile']);
Route::get('/student-update-profile-page', function(){
         return view('student.update_profile');
})->name('/student-update-profile-page');

Route::get('/student/view-profile',function(){
    return view('student.view_profile');
});
Route::get('/student/show-notification',function(){
     return view('student.show_notification');
});
Route::get('/student/give-comment',function(){
      return view('student.give_comment');
})->name('student.give-comment');
Route::post('/student/send-comment',[CommentController::class,'student_comment']);
route::get('/student/home', function(){
    return view('student.student');
});
Route::get('/student/show-record', [UsersController::class, 'showRecord']);

});
