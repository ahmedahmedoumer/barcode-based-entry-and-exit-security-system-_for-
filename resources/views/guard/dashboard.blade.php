@extends('guard.security_guard')
@section('guard_content')
<h1>Dashboard</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<section class="section dashboard">
<div class="row">

  <!-- Left side columns -->
  <div class="col-lg-8">
    <div class="row">


      <!-- Customers Card -->
      <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Here <span>| Today</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi-calendar4"></i>
              </div>
              <div class="ps-3">
                <h6>  @if(isset($no_users))
                  {{ $news}}   
                  @endif Posted News </h6>

              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->
      <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">No. <span>| Users</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                  @if(isset($attendance_detail))
                  <h6>
                  {{ $attendance_detail}}   
                  @php
                      $percent=$attendance_detail/$no_users;
                      $percent=$percent*100;
                      $percent=(int)$percent
                  @endphp
                 Students are out of the Institute </h6>
                  
                  
                <span class="text-danger small pt-3 fw-bold">{{$percent}}%</span> <span class="text-muted small pt-2 ps-1">of over all student</span>
                @endif
              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->
      @endsection
