@extends('admin.admin')
@section('content')
<div class="row m-5">
@foreach (Session::get('msg') as $product_id)
<div class="row m-2">
          <div class="card">
            <div class="card-heading alert-success bg-secondary">
            <h5 class="card-title"><center> {{"user comment"}} </center></h5>
            </div>
            <hr>
            <div class="card-body">
               {{$product_id->comment_content}}
            </div>
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col text-start">
                     {{"REPLY : "}}
                   </div>
                   <div class="col text-end">
                   {{$product_id->reply}}
                  </div>
            </div>
             </div>
            <div class="card-footer">
                <div class="text-end">
                @if ($product_id->owner=="1")
                    {{"Sender : Admin"}}
                @elseif ($product_id->owner=="2")
                    {{" Sender : Guard"}}
                @elseif ($product_id->owner=="3")
                    {{" Sender: Staff"}}
                @elseif ($product_id->owner=="4")
                    {{"Sender : Student"}}
                @endif
            </div>
              <div class="text-end">
                {{$product_id->created_at}}
              </div>
              <form action="/reply_comment/{{$product_id->id}}" method="post" id="my_form" style="display: none;">
                @csrf
                  <textarea class="form-control" name="reply_comment" id="comment" cols="30" rows="5" required>please write here...</textarea>
              <div class="row">
                 <div class="col-4 ">
                <input class="form-control bg-danger" type="button" value="close" onclick="Close();">
                 </div>
                 <div class="col-4">
                 <input class="form-control bg-success" type="submit" name="submit" value="reply"></div>
                </div>
              </form>
              <input type="button" class="btn btn-secondary text-start" value="Reply" onclick="reply();">
            </div>
          </div>
</div>
  @endforeach
  <script>
    function reply() {
        document.getElementById("my_form").style.display = 'block';
    }
    function Close(){
        document.getElementById("my_form").style.display = 'none';

    }
  </script>
  </div>
  @endsection
