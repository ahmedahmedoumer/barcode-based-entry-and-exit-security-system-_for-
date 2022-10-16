@extends('admin.admin')
@section('content')
{{-- <!DOCTYPE html>
<html>
    <head>
        <style>

        </style>
    </head> --}}
    <body>
           @if(Session::get('success'))
           <div class="alert alert-success alert-dismissible ">
            {{Session::get('success')}}
            </div>
            @endif
             <form action="/register-pc-info" method="post">
                @csrf
                <div class="container  m-5 ml-10 " style="border: 2px;">
                    <center><h1><b>Register Laptop</b></h1></center>
                    <br>
                <div class="row md-5">
                    <div class="col-4">
                        <label for="Laptop Name"><b> Laptop Owner :</b></label>
                    </div>
                    <div class="col-6">
                        <select name="laptop_owner" class="form-control">
                            @foreach ($listOfUsers as $item)
                            <option value="{{$item->id}}">{{$item->f_name."  ".$item->l_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row md-5">
                    <div class="col-4">
                        <label for="Laptop Name"><b>Laptop Detail :</b></label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="laptop_detail" placeholder=" Laptop Detail">
                    </div>
                </div>
                <br>
                <div class="row md-5">
                    <div class="col-4">
                        <label for="Laptop Name"><b> Serial Number :</b></label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="serial_number" placeholder=" Laptop Serial">
                    </div>
                </div>
                <br>
                <div class="row md-5">
                    <div class="col-4">
                        <label for="Laptop Name"><b> Laptop Name :</b></label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="laptop_name" placeholder=" Laptop Name">
                    </div>
                </div>
                <br>
                <div class="row md-5">
                    <div class="col-4">
                        <label for="Laptop Name"><b> Upload Image file :</b></label>
                    </div>
                    <div class="col-6">
                        <input type="file" class="form-control" name="pc_image">
                    </div>
                </div>
                <br>
                <div class="row md-5">
                    <div class="col-3">
                       <input type="Button" class="form-control alert-danger" onclick="cancel();" style="background:red; color:whitesmoke;" value="Cancel">
                    </div>
                    <div class="col-3">
                        <input type="submit" class="form-control" style="background: green; color:whitesmoke;"  value="Register">
                    </div>
                </div>
                </div>
            </form>
            <script>
                function cancel(){
                    getElementByTagName('input').value="";

                }
            </script>
    </body>
{{-- </html> --}}
@endsection
