@extends('student.student')
@section('student_page')
<div class="row m-5">
    @if (isset($fail_msg))
    <div class="alert alert-success alert-dismissible"> 
        {{"you have not any registered record"}}
    </div>
    @else
    @foreach (Session::get('record') as $product_id)
    <div class="row m-2">
              <div class="card">
                <div class="card-heading">
                <h5 class="card-title"> {{$product_id->record}}</h5>
                </div>
                <hr>
                <div class="card-body">
                   {{$product_id->description}}
                </div>
                <div class="card-footer d-flex justify-content-between">
                  {{$product_id->created_at}}
                </div>
              </div>
              @endforeach
              @endif
    </div>
@endsection
