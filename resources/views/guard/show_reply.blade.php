@extends('guard.security_guard')
@section('guard_content')
<div class="row m-5">
@foreach (Session::get('reply') as $product_id)
<div class="row m-2">
          <div class="card">
            <div class="card-heading  ">
            <center><h5 class="card-title" style="color: black;"> {{"Comments"}}</h5></center>
            </div>
            <hr>
            <div class="card-body text-start">
               {{$product_id->comment_content}}
            </div>
            <div class="card-body bg-light" style="background-color:dimgrey;">
                {{"reply:         ".$product_id->reply}}
             </div>
            <div class="card-footer">
              <div class="align-right text-end">
                {{$product_id->created_at}}
              </div>
            </div>
          </div>
</div>
  @endforeach
  </div>
  @endsection
