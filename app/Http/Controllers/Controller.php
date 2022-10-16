<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\users;
use App\Models\comment;
use Auth;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $msg= new comment();
                $count=$msg->count();
                $data=$msg->all();
                $request_data=users::where('status','request')->get();
                $request_count=users::where('status','request')->count();

                session()->put('request_data',$request_data);
                session()->put('notification_count',$request_count);

                session()->put('count', $count);
                session()->put('msg',$data);
}
}
