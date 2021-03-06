<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ Session::token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard {{ status_user(Session::get('level')) }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.css') }}">


  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  {{show_alert()}}
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>     
    </ul>
  </nav>


<!-- sidebar -->
@if(Session::get('level') == '1')
 @include('layouts/side_admin')
@elseif(Session::get('level') == '2')
  @include('layouts/side_operator')
@elseif(Session::get('level') == '3')
  @include('layouts/side_anggota')
@endif

<!-- end sidebar -->
@yield('content')
{{-- <div class="content-wrapper">
</div> --}}


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y')?><a href="#">Koperasi</a>.</strong>
    All rights reserved.   
  </footer>

  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</div>

<script src="{{asset('lte/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{asset('lte/dist/js/adminlte.js') }}"></script>
<script src="{{asset('lte/dist/js/pages/dashboard.js') }}"></script>
<script src="{{asset('lte/dist/js/demo.js') }}"></script>
<script src="{{asset('js/custom.js') }}"></script>
<script src="{{asset('js/bootstrap-select.js') }}"></script>


<script src="{{asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{asset('js/data_table.js') }}"></script>



</body>
</html>






