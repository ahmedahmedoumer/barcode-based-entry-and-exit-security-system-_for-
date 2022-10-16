@extends('admin.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KIOT security system</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
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
        <div class="card card-registration card-registration-2 inset" style=" border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                    @if(session('success_registred'))
                    <div class="alert alert-success alert-dismissible">{{session('success_registred')}}</div>
                   @endif
                   @if(session('failed_registred'))
                    <div class="alert alert-danger alert-dismissible">{{session('failed_registred')}}</div>
                    @endif
           @if (isset($update_user))
           @foreach ($update_user as $user)
                  <h3 class="fw-normal mb-5" style="color: #4835d4;">Detail Infomation</h3>
                  <form action="/update-user/{{$user->user_id}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                            <input type="text" id="form3Examplev2" name="username" class="form-control form-control-lg" value="{{$user->f_name}}" />
                            <label class="form-label" for="form3Examplev2">Username</label>
                            @error('username')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                            <input type="text" id="form3Examplev3" name="password" class="form-control form-control-lg" value="{{$user->l_name}}"  />
                            <label class="form-label" for="form3Examplev3">Password</label>
                            @error('password')
                              <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev2" name="f_name" class="form-control form-control-lg" value="{{$user->f_name}}" />
                        <label class="form-label" for="form3Examplev2">First name</label>
                        @error('f_name')
                           <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev3" name="l_name" class="form-control form-control-lg" value="{{$user->l_name}}"  />
                        <label class="form-label" for="form3Examplev3">Last name</label>
                        @error('l_name')
                        <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                      <div class="form-outline">
                        <input type="text" id="form3Examplev5" name="id_number" class="form-control form-control-lg" value="{{$user->id_number}}"  />
                        <label class="form-label" for="form3Examplev5">ID Number</label>
                        @error('id_number')
                           <span class="alert alert-danger">{{$message}}
                        @enderror</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <select class="select form-control form-control-lg" id="form3Examplev5" name="department" value="{{$user->department}}">
                        <option selected >Department</option>
                        <option value="SW">SW</option>
                        <option value="CS">CS </option>
                        <option value="IS">IS</option>
                        <option value="IT">IT</option>
                      </select>
                      @error('departmnet')
                      <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                    </div>
                  <div class="mb-4 pb-2">
                    <select class="select form-control form-control-lg" name="batch" id="batch" value="{{$user->Batch}}">
                      <option selected>Batch</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                    </select>
                    @error('batch')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                  </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <select class="select form-control form-control-lg" name="section" id="section" value="{{$user->section}}">
                      <option selected>Section</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  @error('section')
                   <span class="alert alert-danger">{{$message}}</span>
                  @enderror
                  </div>

                  <input type="file" name="image" id="image" value="" class="form-control" placeholder="please select image">
                  @error('image')
                  <span class="alert alert-danger">{{$message}}</span>
                 @enderror
                </div>
              </div>
              <div class="col-lg-6 bg-indigo">
                <div class="p-5">
                  <!-- <h3 class="fw-normal mb-5">Contact Details</h3> -->

                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" >
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
                    <div class="col-md-7 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <input type="text" id="form3Examplea8" name="phone_no" class="form-control form-control-lg" value="{{$user->phone_no}}"/>
                        <label class="form-label" for="form3Examplea8">Phone Number</label>
                       @error('phone_no')
                         <span class="alert alert-danger">{{$message}}</span>
                       @enderror
                      </div>
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-outline form-white">
                      <input type="email" id="form3Examplea9" name="email" class="form-control form-control-lg" value="{{$user->email}}"/>
                      <label class="form-label" for="form3Examplea9"> Email</label>
                      @error('email')
                       <span class="alert alert-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-check d-flex justify-content-start mb-4 pb-3">
                    <input class="form-check-input me-3" type="checkbox" name="check_box" value="" id="form2Example3c" required  />
                    <label class="form-check-label " for="form2Example3">
                      I do accept the <a href="#!"><u>Terms and Conditions</u></a> of your
                      site.
                    </label>
                  </div>
                  <input type="submit" class="btn btn-primary" value="update"
                    data-mdb-ripple-color="dark">
                </form>
                @endforeach
            @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
@endsection('content')
