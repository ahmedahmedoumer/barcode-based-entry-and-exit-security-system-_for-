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
    @if(Session::get('success_registred'))
    <div class="alert alert-success alert-dismissible">{{Session::get('success_registred')}}</div>
   @endif
   @if(Session::get('failed_registred'))
    <div class="alert alert-danger alert-dismissible">{{Session::get('failed_registred')}}</div>
    @endif
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">List of users</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            @if (isset($data))
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($data as $product_id)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$product_id->f_name."     ".$product_id->l_name}}</td>
                                    <td>@if ($product_id->role=="1")
                                        {{"Admin"}}
                                    @elseif ($product_id->role=="2")
                                        {{"Guard"}}
                                    @elseif ($product_id->role=="3")
                                        {{"Staff"}}
                                    @elseif ($product_id->role=="4")
                                        {{"Student"}}
                                    @endif
                                    </td>
                                    <td>{{$product_id->email}}</td>
                                    <td><a class="btn btn-primary" name="update" id="update" href="/update/{{$product_id->user_id}}">update</a></td>
                                    <td><a class="btn btn-danger"  name="update" id="update" href="/deactive/{{$product_id->user_id}}" >deactive</a></td>
                                </tr>
                                @php
                                $no=$no+1;;
                               @endphp
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    <!-- End of Main Content -->

    </div>

</body>
</html>
@endsection
