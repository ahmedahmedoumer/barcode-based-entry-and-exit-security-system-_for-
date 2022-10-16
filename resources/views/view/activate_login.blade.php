<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <title>Account Activation form</title>
</head>
<body>
    @if (Session::get('success_verify'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('success_verify')}}
    </div>
    @endif
      @php
          $link="/send_verification_code";
      @endphp
    <div class="h-100 d-flex align-items-center justify-content-center">
    <div id="logreg-forms" class="form-group ">
        <form  class="myform" action="{{$link}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Activate Account</h1>
            <input type="text" id="username" name="username" class="form-control" placeholder="username" required="">

            <br>
            <input type="password" id="password" name="password" class="form-control" placeholder="password"  required="">
            <br>
           <input type="text" id="verification_code" name="verification_code" class="form-control" placeholder="Verification code" >
           <input type="submit" value="submit" id="submit"  class="form-control btn btn-primary" >
            </form>
        </div>
</div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>
