 @extends('admin.admin')
@section('content')
<!doctype html>
<html>
    <head>
<meta name="_token" content="{{ csrf_token() }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
</style>
</head>
<body>
    @if(session::get('success_registred'))
    <div class="alert alert-success alert-dismissible">{{session::get('success_registred')}}</div>
   @endif
   @if(session::get('failed_registred'))
    <div class="alert alert-danger alert-dismissible">{{session::get('failed_registred')}}</div>
    @endif
    <div class="container">
        <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h3>users info </h3>
        </div>
        <div class="panel-body">
        <div class="form-group">
        <input type="text" class="form-controller" id="search" name="asearch">
        </div>
        <table class="table table-bordered table-hover">
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
        <tbody>

        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>


         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">List of users</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach (Session::get('listOfUsers') as $product)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$product->id_number}}</td>
                                    <td>{{$product->f_name."     ".$product->l_name}}</td>
                                    <td>@if ($product->role=="1")
                                        {{"Admin"}}
                                    @elseif ($product->role=="2")
                                        {{"Guard"}}
                                    @elseif ($product->role=="3")
                                        {{"Staff"}}
                                    @elseif ($product->role=="4")
                                        {{"Student"}}
                                    @endif
                                    </td>
                                    <td>{{$product->email}}</td>
                                    <td><a class="btn btn-primary" name="update" id="update" href="/update/{{$product->user_id}}">update</a></td>
                                    <td> @if ($product->status=="approved")
                                        <a class="btn btn-danger"  name="deactive" id="deactive" href="/deactive/{{$product->user_id}}"> deactive  </a>
                                        @elseif ($product->status=="deactive")
                                        <a class="btn btn-success"  name="update" id="update" href="/active/{{$product->user_id}}"> active  </a>
                                        @else
                                        <a class="btn btn-warning"  name="verify" id="verify" href="/verify_user/{{$product->user_id}}"> verify  </a>
                                        @endif

                                    </td>
                                </tr>
                                @php
                                $no=$no+1;
                               @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    <!-- End of Main Content -->

    </div>
    <script type="text/javascript">
        $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
        type : 'get',
        url : '{{URL::to('search')}}',
        data:{'search':$value},
        success:function(data){
        $('tbody').html(data);
        }
        });
        })
        </script>
        <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
</body>
</html>
@endsection

