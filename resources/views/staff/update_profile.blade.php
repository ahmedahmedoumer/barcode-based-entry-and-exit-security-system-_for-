@extends('staff.staff')
@section('staff_content')
<body>
    @foreach (Session::get('login_id') as $item)
    <div class="container">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                    </div>
                    <input type="text" class="form-control" id="fullName" disabled value="{{ $item->f_name."     ".$item->l_name}}" >
                    <h6 class="user-email">{{$item->email}}</h6>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>



                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" disabled value="{{ $item->f_name."     ".$item->l_name}}" >
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">Email</label>
                        <input type="email" class="form-control" id="eMail" disabled value="{{$item->email}}" >
                    </div>
                </div>
            </div>
            @if (isset($validator))
                     <div class="alert-danger">{{$validator}}</div>
                @endif
                <form action="/update-staff-profile" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Feel below To Update</h6>
                    </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{"+251 " .$item->phone_no }}" >
                        @error('phone_no')  <span class="alert-danger"> {{$message}} </span>@enderror
                    </div>
                </div>
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="name" class="form-control" name="username" id="Street" placeholder="Enter new Username" >
                      @error('username')  <span class="alert-danger"> {{$message}} </span>@enderror
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter new email">
                        @error('email')  <span class="alert-danger"> {{$message}} </span>@enderror
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter new Password">
                        @error('password')  <span class="alert-danger"> {{$message}} </span>@enderror

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm" placeholder="Confirm Password">
                        @error('confirm_password')  <span class="alert-danger"> {{$message}} </span>@enderror
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>

            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    @endforeach
</body>
@endsection
