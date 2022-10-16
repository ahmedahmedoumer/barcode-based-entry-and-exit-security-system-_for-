@extends('admin.admin')
@section('content')
<!doctype html="lang">
<head>
    <style>
        /* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  width: 25%;
  bottom: 25%;
  top: 15%;
  height: 50%;
  right: 20%;
  border: 3px solid #f30606;
  z-index: 9;
  background-color: rgb(243, 240, 240);
}

/* Add styles to the form container */
.form-container {
  max-width: 800px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}
.btn-secondary:hover { background-color:black; }

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
    </style>
</head>
<body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}>
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Reports</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>phone no</th>
                                    <th>total left in @if(Session::has('schedule'))
                                      {{Session::get('schedule')}}
                                      @endif
                                    </th>
                                    <th>Action</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                {{-- //href="/give_record/{{$product_id->user_id}}" --}}
                                @foreach (Session::get('report') as $product_id)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$product_id->f_name."     ".$product_id->l_name}}</td>
                                    <td>{{"+251".$product_id->phone_no}}</td>
                                    <td>{{$product_id->total}}</td>
                                    <td><input type="text" class="btn btn-success" name="send_message" id="send_message"
                                       hidden="true" value="{{$product_id->user_id}}"/>
                                    <a class="btn btn-danger"  value="{{$product_id->user_id}}"
                                        name="give_record" id="give_record" onclick="openForm()" >Give record</a></td>
                                        <td>
                                       <form id="detail_view" action="/view-detail/{{$product_id->user_id}}" method="post"></form>  
                                        <a class="btn btn-secondary"
                                            name="give_record" id="give_record" 
                                            onclick="document.getElementById('detail_view').submit(); return false">View detail</a></td>
                                </tr>
                                @php
                                $no=$no+1;;
                               @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <a class="align-right btn btn-success align-left" href="/print-page">prepare pdf</a>
        <div class="form-popup" id="myForm">
            <form  name="myform" id="form_id" class="form-container" method="POST">
               @csrf
              <label for="message"><b>Some detail Message</b></label>
              <br>
              <textarea class="form-control" name="message" id="message" rows="3" name="message" required> enter description of record</textarea>

              <button type="submit" class="btn">Send Message</button>
              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
          </div>

        <script>
            function openForm() {
              document.getElementById("myForm").style.display = "block";
              var id = document.getElementById('send_message').value;
              var frm = document.getElementById('form_id') || null;
              var link1="give_record/";
              if(frm) {
              frm.action = link1.concat(id);
               }

            }

            function closeForm() {
              document.getElementById("myForm").style.display = "none";
            }
            </script>
    </body>
@endsection
