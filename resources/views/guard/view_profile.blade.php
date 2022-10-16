@extends('guard.security_guard')
@section('guard_content')
<!DOCTYPE html>
<html>
    <head>

    </head>
<body>
@foreach (Session::get('login_id') as $product_id)
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$product_id->f_name}}</h5>
              <p class="text-muted mb-1">Guard</p>
              <p class="text-muted mb-4">Wollo University KIOT</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Back</button>
                <a class="btn  ms-1 btn-primary btn-xs" style="margin:1%;" href="/guard/update-profile">Update profile</a>
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
                  <p class="text-muted mb-0">{{$product_id->phone_no}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">role</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{"Guard"}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">ID</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="id_number">{{$product_id->id_number}}</p>
                </div>
              </div>
              <div class="row">

                <div class="col-sm-9">
                  <p class="text-muted mb-0 barcode_id"><svg id="barcode"></svg></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach

  <script src="../assets/js/JsBarcode.all.min.js"></script>
  <script>
     var serial =document.getElementById('id_number').textContent;
         JsBarcode("#barcode", serial);
  </script>
</body>
</html>
@endsection
