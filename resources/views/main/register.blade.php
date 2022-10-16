@extends('welcome')
@section('home')
<!doctype html="lang">
<html>
    <head>
        <style>
            .marginal {
                margin:20px;
                border:solid 2px;
                width:100%;
                padding: 10px;
            }
        </style>
    </head>
<body>
<!-- <div class="container form-group form-control"> -->
    <h1><b><i>Register </i></b></h1>
<form class="well form-horizontal marginal" action="/send_Request" method="post"  id="contact_form">
    @csrf
<!-- Text input-->
@if(Session::get('send_Request'))
   <div class="alert alert-success"> {{Session::get('send_Request')}}</div>
@endif
@if(Session::get('send_request_fail'))
   <div class="alert alert-danger"> {{Session::get('send_request_fail')}}</div>
@endif
<div class="form-group">
<div class="input-group">
<input  name="first_name" placeholder="First Name" autofocus  class="form-control" type="text">
@error('first_name')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
</div>
<!-- Text input-->
<div class="form-group">
<div class="input-group">
<input name="last_name" placeholder="Last Name" class="form-control"  type="text">
@error('last_name')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
</div>
<!-- Text input-->
<div class="form-group">
<div class="input-group">
    <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    @error('email')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
</div>
<!-- Text input-->
<div class="form-group">
<div class="input-group">
<input name="username" placeholder="Username" class="form-control" type="text">
@error('username')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
</div>
<!-- Text input-->
<div class="form-group">
<div class="input-group">
    <input name="password" placeholder="Password" class="form-control" type="password">
    @error('password')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
<div class="input-group">
    <input name="password_confirmation" placeholder="Re-Enter Password" class="form-control" type="password">
    @error('password_confirmation')<span class="btn btn-danger">{{$message}} </span>@enderror
</div>
</div>

<div class="form-group">
    <div class="input-group">
    <select name="role" class="form-control selectpicker" >
      <option value=" " >Please select your role</option>
      <option value="4">Student</option>
      <option value="3">Staff</option>
      <option value="2">Security Guard</option>
      <option value="1">Admin</option>
    </select>
</div>
</div>

<div class="form-group">
<div class="input-group">
<input name="id" placeholder="WOUR/0775/10" class="form-control" type="text">
</div>
</div>

<!-- Button -->
<div class="form-group">
<div class="col-md-4">
<input type="submit" class="btn btn-warning" value="send request"> <span class="glyphicon glyphicon-send"></span>
</div>
</div>
</form>
<!-- </div> -->
    </body>
    </html>
    @endsection('home')
