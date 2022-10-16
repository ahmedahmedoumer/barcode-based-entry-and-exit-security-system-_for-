@extends('admin.admin')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
             input,label {font-weight:bold;}
        </style>
    </head>
    <body>
        <div class="container">
            @if (Session::has('setTime'))
            <div class="alert alert-success">
                {{Session::get('setTime')}}
            </div>
            @endif
        <div class=" col-4 mb-6">
            <label for="oldTime" class="form-label">Old Entry Time</label><input type="text" class="form-control" id="ExitTime" value="@if (isset($time))
            {{$time->exit_time}}
            @endif" disabled>
            <br>
            <label for="newTime" class="form-label"><b>Old Exit Time</b></label><input type="text" class="form-control" id="entryTime" value="@if (isset($time))
            {{$time->entry_time}}
            @endif" disabled>
          </div>
          <div class="col-4 mb-6">
            <form action="/Set_times" method="post">
                @csrf
            <br>
            <label for="newTime" class="form-label">New Exit Time</label>
            <input type="text" class="form-control" name="entryTime" id="new Entry Time" placeholder="set New Time">
            <br>
            <label for="newTime" class="form-label">New Entry Time</label>
            <input type="text"  class="form-control" name="exitTime" id="new Exit Time" placeholder="set New Time">
            <br>
            <input type="submit" value="set Time" class="form-control btn btn-primary">
        </form>
          </div>
        </div>
    </body>
</html>
@endsection
