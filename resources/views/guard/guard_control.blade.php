<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Vehicle Insurance</title>
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">

        <style>
            .background{
                background-color: rgb(248, 245, 245);
                border: 3px;
                border-color: black;
                height: 40%;
                padding-bottom: 40%;
            }
            .headers{
                background-color: rgb(10, 10, 10);
                height: 200%;
                font: 700;
                color: white;
                padding-top: 10px;
                padding-left: 10;
                margin: 5%;
            }
            .headertext{
                padding-left:30%;
                height: 30%;
                color: white;
            }
            .padding{
                text-align: center;
                background-color: rgb(17, 17, 17);
            }
            .imageposition{
            padding-right: 15%;
            border: 3px;
            height: 250px;
            width: 200px;
            }
            .other{
             padding-left: 20%;
             font: 400%;
            }
            .paddings{
                padding-right: 5%;
            }
            .paddingse{
                padding-left: 5%;
            }
            .all{
                margin-left: 20%;
                margin-right: 10%;
                margin-bottom: 10%;
            }
        </style>
    </head>
    <body>
        <div class="col-md-9">
        @if (isset($user_data))
        <div class="background">
            <h1 class="padding">Personal info</h1>
            <div class="rounded float-left other paddingse ">
            <p>ID:  {{ $user_data->id_number}}</p>
            <p>Full name:   {{$user_data->f_name."   ".$user_data->l_name}}</p>
            <p>Phone No:{{$user_data->phone_no}}</p>
            <p>department: {{$user_data->department}}</p>
            <p>email:   {{$user_data->email}}</p>
            <p>Batch:   {{$user_data->batch}}</p>
            <p>sex:   {{$user_data->sex}}</p>
            </div>
            <img src="
            @if ($user_data->image==null)
            {{'../uploads/contact.png'}}


            @else
           {{$user_data->image}}
            @endif
            " class="rounded float-right imageposition paddings" alt="...">

        </div>

             @if($user_data->image==null)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>No profile photo!</strong> You should upload your profile photo in the fields above.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            <input type="submit" onclick="Request({{$user_data}})" value="click to detail" id="detail" name="detail"
            class="btn btn-outline-secondary btn-lg btn-block">
    @endif
    </div>
    <script>
        document.getElementById('detail').onclick=function(){
            alert("No Detail please check another");
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#tabs').tab();
    });
    $().button('toggle');
    $('#myDropdown').on('show.bs.dropdown', function () {
      $('.dropdown-toggle').dropdown()
    });
    $('.dropdown-toggle').dropdown();
    $('a.dropdown').on('click',function(){
        $(this).parent().toggleClass('open');
    });
    $('dropdownmenubutton').on('click',function(){
        $(this).parent().toggleClass('open');
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
