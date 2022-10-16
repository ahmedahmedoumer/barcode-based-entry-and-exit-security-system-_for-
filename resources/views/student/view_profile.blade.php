@extends('student.student')
@section('student_page')
@foreach (Session::get('login_id') as $product_id)
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$product_id->f_name}}</h5>
              <p class="text-muted mb-1">Student</p>
              <p class="text-muted mb-4">Wollo University KIOT</p>

              <p>@if (Session::get('record'))

             @foreach (Session::get('record') as $item)
                {{"You have record".$item->record}}
                <br>
                {{"Reason".$item->description}}
                <br>
                {{"created_at".$item->created_at}}
              @endforeach
              @endif</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Back</button>
                <a type="button" class="btn btn-outline-primary ms-1" href="/student-update-profile-page">Update profile</a>
              </div>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">

            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"> Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $product_id->f_name."    ".$product_id->l_name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$product_id->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{"+251 ".$product_id->phone_no}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">ID Number</p>
                </div>
                <div class="col-sm-9">
                  <p id="id_number" class="text-muted mb-0">{{$product_id->id_number}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">role</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{"student"}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Barcode id</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><svg id="barcode"></svg></p>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
    <script src="../assets/js/JsBarcode.all.min.js"></script>
    <script>
     var serial =document.getElementById('id_number').textContent;
         JsBarcode("#barcode", serial);
  </script>
  @endforeach
@endsection
