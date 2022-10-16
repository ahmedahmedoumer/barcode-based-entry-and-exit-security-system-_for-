<!DOCTYPE html>
<html lang="en">

  <head>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
<link rel="stylesheet" href="assets/css/owl.css">
<link rel="stylesheet" href="assets/css/lightbox.css">
  <style>
body {
    background: #f8f7f7;
    font-family: 'Roboto', sans-serif;
}

.login-box {
    margin-top: 10%;
    height: auto;
    background: #fafbfc;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #f9fafc;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
    background-color: #f7fafc;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=password] {
    background-color: #fbfcfd;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #fbfcfd;
    color: #ECF0F5;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}
.marginal{
    margin:20%;
    margin-top: 0%;
}
.paddings{
    padding:20%;


}

.btn-outline-primary {
    border-color: #fafbfc;
    color: #fbfdfd;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(243, 241, 241, 0.24);
}



.login-btm {
    float: right;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #f9fafa;
}

.loginbttm {
    padding: 0px;
}

  </style>
  </head>

<body>
   
<div class="container bg-white">
        <div class="row bg-white" >
            <div class="col-lg-3 col-md-2 "></div>
            <div class="col-lg-6 col-md-8 login-box marginal">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title " style="color:black;">
                  Login page
                </div>
                @if (isset($login_error))
                <div class="alert alert-danger alert-dismissible fade show" style="color:red;margin-bottom:5px;margin-top:5%;" role="alert">
                    <strong>Sorry sir!</strong>    {{$login_error}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                {{-- <div class="col-lg-12 alert alert-danger alert-dismissible" style="color:red;margin-bottom:5px;margin-top:5%;">
                    {{$login_error}}
                </div> --}}
                 @endif
                <div class="col-lg-12 login-form" >
                    <div class="col-lg-12 login-form">
                         @if(!empty($msg))
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$msg}}

                         </div>
                          </div>
                          @endif
                        <form class="paddings" action="/login_data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control" style="color:black;">
                                @if (count($errors)>0)
                                    <span class="alert alert-danger btn-warning">{{$errors->first('username')}}</span>

                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" style="color: black;"  name="password" class="form-control">
                                @if (count($errors)>0)
                                    <span class="alert alert-danger btn-warning">{{$errors->first('password')}}</span>

                                @endif
                            </div>
                            <div class="form-group ">
                            <select class=" form-control form-select" style="color: black;" name="role" aria-label="Default select example">
                              <option selected>Type</option>
                              <option value="1">Admin</option>
                              <option value="2">Guard</option>
                              <option value="3">Staff</option>
                              <option value="4">Student</option>
                            </select>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                 <div class="col-lg-6 login-btm login-button">
                                    <a href="/" class="btn btn-primary">Back</a>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                {{-- <a href="/forgot-password" >Forgot Password </a> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
        $('.alert').alert()
       function alertuser(msg) {

              var username = sessionStorage.getItem("verification_success");
              Swal.fire(username);
            }
        </script>

</body>





