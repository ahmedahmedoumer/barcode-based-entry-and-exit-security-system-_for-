@extends('staff.staff')
@section('staff_content')
<div class="row m-5">
@foreach (Session::get('news') as $product_id)
<div class="row m-2">
          <div class="card">
            <div class="card-heading alert-success ">
            <h5 class="card-title"> {{$product_id->heading}}</h5>
            </div>
            <hr>
            <div class="card-body">
               {{$product_id->news_content}}
            </div>
            <div class="card-footer">
              {{$product_id->owner}}
              <div class="align-right">
                {{$product_id->created_at}}
              </div>
            </div>
          </div>
</div>
  @endforeach
  </div>
  @endsection
