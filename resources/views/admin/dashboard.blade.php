@extends('layout/template')
@section('title','Dashboard')
@section('title-content','Dashboard')
@section('content','dashboard')
@section('links')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/template')}}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$daftar}}</h3>

                <p class="pb-1 pt-1">LAB Submission</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="{{url('/daftar/pengajuan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$comp}} / 272</h3>

                <p class="mb-0">Computer Active <br>at {{$current}}</p>
              </div>
              <div class="icon">
                <i class="fas fa-desktop"></i>
              </div>
              <a href="{{url('/computer/lab')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$jadwal}} / 24</h3>

                <p class="pb-1 pt-1">Class Schedule Today</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="{{url('/jadwal/view/class')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p class="pb-1 pt-1">User Blocked</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-4 connectedSortable">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Request</h3>

                <div class="card-tools">
                  <span title="{{$jumlah}} New Messages" class="badge badge-success">{{$jumlah}} Message</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  
                  @foreach($pesan as $message)
                    @foreach($users as $user)
                    @if($user->id == $message->user_id)
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{$user->name}}</span>
                      <span class="direct-chat-timestamp float-right">{{$message->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    @if(empty($user->avatar))
                    <img src="{{asset('/img/default-foto.png')}}" class="direct-chat-img" alt="message user image">
                    @else
                    <img src="{{asset('/storage/images/'.$user->avatar)}}" class="direct-chat-img" alt="message user image">
                    @endif
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{$message->pesan}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                    @endif
                    @endforeach
                  @endforeach
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer"></div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-4 connectedSortable">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                    @php($i=0)
                    @foreach($users as $user)
                      @if($user->isOnline())
                      @php($i++)
                      @endif
                    @endforeach
                      <span class="badge badge-primary">{{$i}} Online</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                    @foreach($users as $user)
                      @if($user->isOnline())
                      <li class="list-group-item">
                        <span class="font-weight-normal">{{$user->name}}</span>
                        <span class="users-list-date text-success">Online</span>
                      </li>
                      @endif
                    @endforeach

                    @foreach($users as $user)
                      @if(!$user->isOnline())
                      <li class="list-group-item">
                        <span class="font-weight-normal">{{$user->name}}</span>
                        <span class="users-list-date">Offline</span>
                      </li>
                      @endif
                    @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript:">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
          </section>
          <section class="col-lg-4 connectedSortable">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class Today</h3>
                <div class="card-tools">
                <span class="badge badge-warning">{{$jadwal}} Class</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($tbl_jadwal as $jdwl)
                  <li class="item">
                    <div class="ml-2">
                      <span class="product-title">{{$jdwl->matkul}}
                      </span>
                      <span class="product-description">
                        Waktu : {{$jdwl->waktu}}
                      </span>
                      <span class="product-description">
                        Ruangan : {{$jdwl->ruang}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('/jadwal/view/class')}}" class="uppercase">View All Class</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{asset('/template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/template')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/template')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/template')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/template')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/template')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/template')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('/template')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/template')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/template')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/template')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/template')}}/dist/js/pages/dashboard.js"></script>
@endsection