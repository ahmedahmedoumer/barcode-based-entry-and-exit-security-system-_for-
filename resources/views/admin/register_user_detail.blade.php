@extends('admin.admin')
@section('content')
<!DOCTYPE html>
  <html>
    <head>
        <style>
            @media (min-width: 1025px) {
  .h-custom {
   height: 100vh !important;
    }
   }
.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}

.bg-indigo {
background-color: #Eef1f1;
}
@media (min-width: 992px) {
.card-registration-2 .bg-indigo {
border-top-right-radius: 15px;
border-bottom-right-radius: 15px;
}
}
@media (max-width: 991px) {
.card-registration-2 .bg-indigo {
border-bottom-left-radius: 15px;
border-bottom-right-radius: 15px;
}
}
</style>
</head>
<body>
<section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
       @if(Session::get('success_registred'))
       <div class="alert alert-success alert-dismissible">{{Session::get('success_registred')}}</div>
      @endif
      @if(Session::get('success_registred'))
       <div class="alert alert-danger alert-dismissible">{{Session::get('failed_registred')}}</div>
       @endif
        <div class="card card-registration card-registration-2 inset" style=" border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #4835d4;">Detail Infomation</h3>
                  <form action="/detail-register" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev2" name="f_name" class="form-control form-control-lg" />
                        @error('f_name')  <span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                        <label class="form-label" for="form3Examplev2">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev3" name="l_name" class="form-control form-control-lg" />
                        @error('l_name')  <span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                        <label class="form-label" for="form3Examplev3">Last name</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev5" name="id_number" class="form-control form-control-lg" />
                        @error('id_number')  <span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                        <label class="form-label" for="form3Examplev5">ID Number</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <select class="select form-control form-control-lg" id="form3Examplev5" name="department">
                        <option selected >Department</option>
                        <option value="2">Software</option>
                        <option value="3">Computer Science</option>
                        <option value="4">Information technology</option>
                        <option value="2">Information System</option>
                        <option value="3">Civil</option>
                        <option value="4">Mechanical technology</option>
                        <option value="2">Water</option>
                        <option value="3">Textile</option>
                        <option value="4">Electrical</option>
                      </select>
                    </div>
                  <div class="mb-4 pb-2">
                    <select class="select form-control form-control-lg" name="batch" id="batch">
                      <option selected>Batch</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <select class="select form-control form-control-lg" name="section" id="section">
                      <option selected>Section</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>



                  <input type="file" name="image" id="image"  class="form-control" placeholder="please select image">
                  @error('image')  <span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                </div>
              </div>
              <div class="col-lg-6 bg-indigo">
                <div class="p-5">
                  <!-- <h3 class="fw-normal mb-5">Contact Details</h3> -->
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Male
                      </label>
                      </div>
                     <div class="form-check">
                     <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                    </div>
                  <div class="row">
                    <div class="mb-4 pb-2">
                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea8" name="phone_no" class="form-control form-control-lg" />
                         @error('phone_no')  <span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                        <label class="form-label" for="form3Examplea8">Phone Number</label>
                      </div>
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-outline form-white">
                      <input type="email" id="form3Examplea9" name="email" class="form-control form-control-lg" />
                      @error('email')<span class="alert-danger" style="color: red;"> {{$message}} </span>@enderror
                      <label class="form-label" for="form3Examplea9"> Email</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <select class="form-select" name="role"aria-label="Default select example">
                        <option value="1" selected>Admin</option>
                        <option value="2">Guard</option>
                        <option value="3">Staff</option>
                        <option value="4">Student</option>
                      </select>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Register"
                    data-mdb-ripple-color="dark">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<body>
</html>
@endsection('content')
