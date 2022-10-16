@extends('guard.security_guard')
@section('guard_content')
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .all{
        margin-left: 20%;
        margin-right: 10%;
        right: 20%;
        margin-bottom: 10%;
            }
</style>
</head>
<body>
<form action="/control-check" method="post">
    @csrf
    <!-- <div class="row">
          
          <div class="col-4">
            <b>
          <span style="color:black;">@foreach(Session::get('time_set') as $time)
                                   {{"Entry Time : ".$time->entry_time->format('H:i:s')}}
                                   @endforeach
          </span></b>
          </div>
          <div class="col-4">
          <b>
          <span style="color:black;">@foreach(Session::get('time_set') as $time)
                                   {{"Exit Time : ".$time->exit_time->format('H:i:s')}}
                                   @endforeach
          </span></b>
          </div>
          <div class="col-4">

          </div>
    </div> -->
  <div class="row border-solid">
    <div class="col-4"></div>
        <div class="col-4 rounded">
        <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
          <input type="radio" style="width:25px;height:25px;color:black;" id="q156" name="getway" value="1" checked="checked" /> <b style="font-size: 30px;"> For Get In </b> 
        </label>
        </div>
        </div>
        <div class="col-4 rounded">
        <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default">
          <input type="radio" style="width:25px;height:25px;color:black;" id="q157" name="getway" value="2" /><b style="font-size: 30px;">  For Get Out</b>
          </label>
        </div>
        </div>
  </div>
    <div class="container all">
        <div class="row-10">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Control</h3>
                        <div class="panel-body ">
                           <div class="row">
                            <div class="col-8">
                            <input class="form-control" type="text" name="id" id="insert_id" autofocus>
                            </div>
                            <div class="col-4">

                            </div>
                           </div>
                           
                            @error('id')
                              <span class="alert alert-danger form-control-error">{{$message}}</span>
                              <br>
                            @enderror
                            <input type="submit" value="submit" id="submmit_btn" class="btn btn-primary">
                           
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    @if(isset($allow))
         
    <div class="success_msg" id="success_msg">
    <div  id="success_msg" style="margin=-25%;" class="alert alert-success alert-dismissible alert all ">
        {{$allow}}
    </div>
    </div>
    <audio src="videoplayback.mp3" id="boom" loop="loop" autoplay="autoplay">
     </audio>
    <script type="text/javascript">
       var player=document.getElementById("boom");
       player.play();
       player.loop=false;
    </script>
    @if (isset($laptop_owner))
        @include('guard.laptop_owner');
    @endif
      @include('guard.guard_control');
    @endif
    @if(isset($ignore))
    <div id="ignore" class="alert alert-danger alert-dismissible alert all">
        {{$ignore}}
        
    </div>
    <audio src="wrong.mp3" id="boom" loop="loop" autoplay="autoplay">
     </audio>
    <script type="text/javascript">
       var player=document.getElementById("boom");
       player.play();
       player.loop=false;
    </script>
    @endif
    </div>
    </form>
    <script type="text/javascript">
           var value=document.getElementById('seter').innerHTMl;
           if (value="Over!!") {
            document.getElementById('seter').remove();
            // document.getElementById('submmit_btn').remove();
            document.getElementById('seter').innerHTMl="Over!!";
           }

        function onload(){
            alert("hello");
        }
        // oQuickReply.swap();


    // $(document).ready(function () {
    // // $('.success_msg iframe').load(function() {
    // //    alert('iframe loaded');
    // // });
    //   }
    $(document).on( "load", ".success_msg", function() {
      alert("ahmedin"); //alerts the count 
    });
    </script>
</body>
</html>
@endsection
