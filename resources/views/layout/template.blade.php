<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/template')}}/dist/css/adminlte.min.css">
  @yield('links')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<script>
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function checkDay(day){
    var ar = new Array(7)
    ar[0] = "Sun";
    ar[1] = "Mon";
    ar[2] = "Tue";
    ar[3] = "Wed";
    ar[4] = "Thu";
    ar[5] = "Fri";
    ar[6] = "Sat";
        
    return ar[day]  
}

function getMonthName(month) {
// create array to hold name of each month
var ar = new Array(12)
    ar[0] = "January"
    ar[1] = "February"
    ar[2] = "March"
    ar[3] = "April"
    ar[4] = "May"
    ar[5] = "June"
    ar[6] = "July"
    ar[7] = "August"
    ar[8] = "September"
    ar[9] = "October"
    ar[10] = "November"
    ar[11] = "December"

    // return name of specified month (parameter)
    return ar[month]
}

function realTime(){
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    var day = now.getUTCDay();
    var date = now.getDate();
    var M = now.getMonth();
    var months = getMonthName(M);
    var year = now.getYear();
    if (year < 1000){
        year += 1900
    }
    now = null;

     //create current times
    m = checkTime(m);
    s = checkTime(s);
    h = checkTime(h);
    day = checkDay(day);

    const nth = function(d) {
        if (d > 3 && d < 21) return 'th';
        switch (d % 10) {
          case 1:  return "st";
          case 2:  return "nd";
          case 3:  return "rd";
          default: return "th";
        }
      }

    document.getElementById('current-time').innerHTML = h + ":" + m + ":" + s;
    document.getElementById('current-date').innerHTML =  months + " " + year;
    document.getElementById('date').innerHTML = date + "<sup>" +nth(date)+"</sup> ";
    document.getElementById('day').innerHTML = day + " ";
    var t = setTimeout(realTime, 1000);
}
</script>
<body onload="realTime()" class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/logoutAdmin')}}" class="nav-link">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="{{asset('/template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin LAB</span>
    </a>
    <div class="brand-link pl-4">
      <span id="date"></span>
      <span class="font-weight-normal brand-text" id="current-date">Loading...</span>
    </div>
    <div class="brand-link pl-3">
    <span id="day"></span>
    <span id="current-time" class="font-weight-normal brand-text">Loading...</span>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(!auth()->user()->avatar)
            <img src="{{asset('/img/default-foto.png')}}" class="img-circle elevation-2" alt="avatar">
            @endif
            @if(auth()->user()->avatar)
                <img src="{{asset('/storage/images/'.auth()->user()->avatar)}}" class="img-circle elevation-2" alt="avatar">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/daftar/pengajuan')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Daftar Pengajuan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/computer/lab')}}" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Computer LAB
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/jadwal/view/class')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-week"></i>
              <p>
                Jadwal Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal LAB
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/jadwal/view/301')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 301</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/jadwal/view/302')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 302</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/jadwal/view/303')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 303</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/jadwal/view/401')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 401</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/jadwal/view/402')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 402</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/jadwal/view/403')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAB 403</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title-content')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('content')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('container')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/template')}}/dist/js/demo.js"></script>
</body>
</html>
