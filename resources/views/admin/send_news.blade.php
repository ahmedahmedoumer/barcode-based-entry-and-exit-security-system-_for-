
@extends('admin.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  {{-- <header id="header" class="header fixed-top d-flex align-items-center"> --}}
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

  {{-- <main id="main" class="main"> --}}
              <!-- Vertical Form -->
            <h1> This is posting news page </h1>
              <form class="row g-3" method="POST" action="/posting_news" enctype="multipart/form-data">
                @csrf
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="col-12 ">
                  <label for="inputNanme4" class="form-label">Heading</label>
                  <input type="text" name="header" id="header" class="form-control @error('header')
                  is-invalid
                  @enderror"  id="inputNanme4">
                  @error('header')<span class="alert alert-danger" >{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                  <textarea class="form-control @error('description') is-invalid @enderror"
                  name="description" id="description" cols="100" rows="10"
                  placeholder="write the description part of the news ..."></textarea>
                  @error('description')<span class="alert alert-danger" >{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                    <select class="form-select" name="type"aria-label="Default select example">
                        <option selected>Type</option>
                        <option value="public">for all users</option>
                        <option value="private">only for registerd</option>
                      </select>
                  </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload any file you want to attach</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="file" id="file"class="custom-file-input form-control"
                        aria-describedby="inputGroupFileAddon01">
                    </div>
                  </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary" onClick="reset()">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


  {{-- </main><!-- End #main --> --}}

<script type="text/javascript">
function reset(){
    document.getElementById('header').value='';
    document.getElementById('description').value='';
}

</script>
  <!-- Vendor JS Files -->
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
@endsection
