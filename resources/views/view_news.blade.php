@extends('welcome')
@section('home')
<!DOCTYPE html>
<html>
    <head>
      <style>
        .form-control{
            border: 0;
         }
      </style>

    </head>
    <body>
<div class="row m-3">
    @if (isset($news))
@foreach ($news as $product_id)
<div class="col">
          <div class="card">
            <input type="text" class="form-control no-border" autofocus>
            <div class="card-heading">
            <h5 class="card-title"><center> {{$product_id->heading}} </center></h5>
            </div>
            <hr>
            <div class="card-body">
               {{$product_id->news_content}}
            </div>
            <div class="card-footer">
              <div class="align-right">
                {{$product_id->created_at}}
              </div>
            </div>
          </div>
          @if($product_id->file!==null)
          <div class="card">
            <div class="card-body"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>{{" ".$product_id->file}}</div>
            <div class="card-body"><a> <a href="/download/{{$product_id->file}}"><img src="/img/pdf.jpg"> </a> </a></div>

          </div>
            @endif

</div>
  @endforeach
  @endif
</div>
<div class="mb-7 align-center">
{{$news->links('pagination::bootstrap-4')}}
</div>
</body>
</html>
    @endsection
