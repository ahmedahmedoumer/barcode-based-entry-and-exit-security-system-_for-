@extends('admin.admin')
@section('content')
<div class="row m-5">
@foreach (Session::get('news') as $product_id)
<div class="row m-2">
          <div class="card">
            <div class="card-heading bg-dark rounded" style="margin: 4px; padding: 6px;">
              <b><center> {{$product_id->heading}} </center></b>
            </div>
            <div class="card-body">
                {{$product_id->news_content}}
             </div>

            <div class="card-footer  ">
                <div class="row">
                    <div class="col">
                {{$product_id->type}}
              <div class="align-right">
                {{$product_id->created_at}}
              </div>
            </div>
            <div class="col">
              <div class="text-end">
                    <a class="btn btn-danger" href="/delete-news/{{$product_id->id}}">Delete</a>
              </div>
            </div>
            </div>
        </div>
          </div>
</div>
  @endforeach
  </div>
  @endsection
