@extends('admin.admin')
@section('content')
<!doctype html>
<html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
</style>
</head>
<body>
    @if(session('success_registred'))
    <div class="alert alert-success alert-dismissible">{{session('success_registred')}}</div>
   @endif
   @if(session('failed_registred'))
    <div class="alert alert-danger alert-dismissible">{{session('failed_registred')}}</div>
    @endif
       
        <!-- /.container-fluid -->
    <!-- End of Main Content -->

    </div>

</body>
</html>
@endsection
