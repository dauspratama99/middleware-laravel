<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free')}}/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins')}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins')}}/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist')}}/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins')}}/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins')}}/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins')}}/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    <marquee><a href="#" class="nav-link text-danger text-bold">Selamat Datang {{ session()->get('nama')}} , Anda Berada Dalam Sistem Informasi Inventory . . . .</a></marquee>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
  
  </nav>
  <!-- /.navbar -->
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block">Nama : {{ session()->get('nama') }}</a>
          <a class="d-block">Status: {{ session()->get('level') }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(session('level') == 'Admin')
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/')}}"  class="nav-link">
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                DATA MASTER
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pengguna/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pelanggan/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pemasok/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pemasok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('kategori/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('satuan/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('barang/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                TRANSAKSI
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('penjualan/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pembelian/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pengembalian/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                LAPORAN
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/penjualan')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/pembelian')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/pengembalian')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/stok')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('logout')}}"  class="nav-link">
              <p>
                KELUAR
              </p>
            </a>
          </li>
          @elseif(session('level') == 'Karyawan')
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/')}}"  class="nav-link">
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                DATA MASTER
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('barang/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                TRANSAKSI
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('penjualan/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pembelian/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pengembalian/index')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('logout')}}"  class="nav-link">
              <p>
                KELUAR
              </p>
            </a>
          </li>
          @elseif(session('level') == 'Pemilik')
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/')}}"  class="nav-link">
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link">
              <p>
                LAPORAN
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('laporan/penjualan')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/pembelian')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/pengembalian')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('laporan/stok')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('logout')}}"  class="nav-link">
              <p>
                KELUAR
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  
    <!-- Main content -->
    <section class="content">
      
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        @yield('content')

        <div class="container-fluid">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <center>

    <footer class="main-footer">
      <strong>Copyright &copy; Tugas Akhir Inventory 2021</strong>
      <!-- All rights reserved. -->
      <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 1.0 -->
      </div>
    </footer>
  </center>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
