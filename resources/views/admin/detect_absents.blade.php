@extends('admin.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        @if (Session::get('detect_absents'))
         <div class="alert alert-success alert-dismissible">
            {{Session::get('detect_absents')}}
         </div>
        @endif


      @if (isset($noof_left))
      <div class="alert alert-success alert-dismissible">
        {{"No. of student left :".$noof_left}}
     </div>
      @endif
      @if (isset($error_message))
      <div class="alert alert-danger alert-dismissible">
        {{$error_message}}
     </div>
      @endif


    </body>
@endsection
