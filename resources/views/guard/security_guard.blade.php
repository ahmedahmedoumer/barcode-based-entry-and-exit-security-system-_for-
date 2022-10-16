
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <i class="bi bi-key-fill"></i><title>Kiot security system</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">@foreach (Session::get('login_id') as $item)
                    {{$item->username}}
                @endforeach</div>
                </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/guard-dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Accounts</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/view-profile">view profile</a>
                        <a class="collapse-item" href="/give-comment">give Comment</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="control_user">
                <a class="nav-link" href="/control">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>control</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/make-attendance" disabled="true">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Make Attendance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Contact</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group text-end" style="color:black">
                        <div class="row">
                            <div class="col-12">
                                <!-- <div class="col-4"></div> -->
                                <div class="col-8">
                                <center><h1><b>
                                <span class="seter" id="seter" style="color:black;">

                                      </span>
                                      
                                @foreach(Session::get('time_set') as $time)
                                <span class="seter" id="seter123" style="color:black;" hidden>
                                <!-- {{$time->entry_time->format('H:i:s')}} -->
                                      </span>
                                      <span class="seter" id="seter1" style="color:black;" hidden>
                                {{$time->entry_time->format('H')}}
                                      </span>
                                      <span class="seter" id="seter2" style="color:black;" hidden>
                                {{$time->entry_time->format('i')}}
                                      </span>
                                      <span class="seter" id="seter3" style="color:black;" hidden>
                                {{$time->entry_time->format('s')}}
                                      </span>
                                      @endforeach
                                  </b></h1></center>
                                    <span class="seter" id="seter" style="color:black;">
                                      
                                    </span>
                                    
                                </div>
                                <div class="col-4">
                                    <!-- <span>
                                        {{Session::get('time_set.exit_time')}}
                                    </span> -->
                                </div>
                            </div>
                        </div>

                              
                            <!-- {{-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2"> --}}
                            {{-- <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div> --}} -->
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1" >
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw" style="color:black;"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">@foreach (Session::get('reply') as $item)
                                    @if ($item->reply)
                                        {{"1"}}
                                    @else
                                       {{"0"}}
                                    @endif
                                   @endforeach
                                </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                @foreach (Session::get('reply') as $item)
                                <a style="color: black; margin:2%;" class="text-start" href="guard/show-reply">{{$item->reply}}</a>
                                @endforeach


                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw" style="color:black;"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{Session::get('counts')}}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="/guard/show_news">
                                    @if (session::get('news'))
                                    @foreach (session::get('news') as $item)
                                    <div class="row">
                                    <div class="dropdown-list-image col-md-4">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold col-md-8">
                                        <div class="text-truncate">{{$item->news_content}}</div>
                                        <div class="small text-gray-500">{{$item->owner."  ".$item->created_at}}</div>
                                    </div>
                                </div>
                                <br>
                                    @endforeach
                                    @endif

                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Session::get('login_id.username')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/view-profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('guard_content')
                    <!-- Content Row -->
                    <div class="row">


                    </div>
               <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/signout">Logout</a>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    var today = new Date();
         var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
         const current_hour=parseInt(today.getHours(), 10);
         const current_min=parseInt(today.getMinutes(), 10);
         const current_sec=parseInt(today.getSeconds(), 10);
        let ho=document.getElementById('seter1').innerHTML;
        let mi=document.getElementById('seter2').innerHTML;
        let se=document.getElementById('seter3').innerHTML;
        const hour = parseInt(ho, 10);
        const minu = parseInt(mi, 10);
        const sec = parseInt(se, 10);
        const all_second=hour*3600+minu*60+sec;
        const current_second=current_hour*3600+current_min*60+current_sec;
        const diff=all_second-current_second;
        let all_times=diff;
        var timer_function=setInterval(() => {
                    
                             let houring=parseInt((all_times/3600),10);
                             let all_min=parseInt(((all_times%3600)/60),10);
                             let all_seconds=parseInt(((all_times%3600)%60),10);
                             if (all_min<10) {
                                document.getElementById('seter').style.color='salmon';
                                all_min="0"+all_min;
                             }
                             if (houring<10) {
                                houring="0"+houring;
                            }
                            if (all_seconds<10) {
                                all_seconds="0"+all_seconds;
                                
                            }
                
                              let time_left=houring + ":" + all_min + ":" + all_seconds;
                              document.getElementById('seter').innerHTML=time_left;
                              if (all_times<=0) {
                              document.getElementById('seter').innerHTML="Over!!";
                              document.getElementById('seter').style.color='salmon';
                              document.getElementById('control_user').remove();
                              document.getElementById('insert_id').remove();
                              
                              clearInterval(timer_function);
                              }
                               all_times--;
                        
                       }, 1000);
    
</script>

        
    <!-- Bootstrap core JavaScript-->
    <!-- <script type=""charset="utf-8">
        let a;
        let time;
        let min;
        let hours;
        console.log("ahmedin"); 
    //     document.getElementById('seter').innerHTML="ahmedin";

    //    alert("hello");
    //   var today = new Date();
    //   var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    //    console.log(time);

        // let ho=document.getElementById('seter1').innerHTML;
        // let mi=document.getElementById('seter2').innerHTML;
        // let se=document.getElementById('seter3').innerHTML;
        // const hour = parseInt(ho, 10);
        // const minu = parseInt(mi, 10);
        // const sec = parseInt(se, 10);
        // const all_second=hour*3600+minu*60+sec;
        // let all_times=all_second;
        // // document.getElementById('seter123').innerHTML=entry_time;
        // // alert(all_seconds);
        // if(x>0;true:false);
        
        //    setInterval(() => {
                    
        //          let houring=parseInt((all_times/3600),10);
        //          let all_min=parseInt(((all_times%3600)/60),10);
        //          let all_seconds=parseInt(((all_times%3600)%60),10);
        //          if(houring<10?"0"+houring:houring;
        //          if(all_min<10?"0"+all_min:all_min;
        //          if(all_seconds<10?"0"+all_seconds:all_seconds;
        //           let time_left=houring + ":" + all_min + ":" + all_seconds;
                  
        //         //   console.log(time_left);
        //            all_times--;
            
        //    }, 1000);
      </script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<!-- {{$time->entry_time->format('H:i:s')}} -->