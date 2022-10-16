@extends('guard.security_guard')
@section('guard_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>
    @if(Session::get('comment_success'))
    <div class="alert alert-success alert-dismissible alert ">
        {{Session::get('comment_success')}}
    </div>
    @endif
    <div style="margin:10%;margin-top:5%; padding:5%;background-color:lightslategrey;" >
     <form method="post" action="/send-comment">
        @csrf
          <div class="form-group col-7 " style="margin-top: 30px" >
            <label for="exampleFormControlTextarea1">comment</label>
            <textarea  class="form-control" id="comment" rows="6" placeholder="Write comment here" name="comment"></textarea>
            <span style="color: red;">@error('comment')
                {{ $message }}
            @enderror</span>
          </div>
        <input type="submit" class="btn btn-primary mb-2" value="send comments">
      </form>
    </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
      <script src="js/popper.min.js"  crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
      <script src="assets/vendor/jquery/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/venobox/venobox.min.js"></script>
      <script src="assets/vendor/aos/aos.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
</body>
</html>
@endsection