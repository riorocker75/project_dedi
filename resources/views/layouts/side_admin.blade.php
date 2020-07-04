
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">{{ status_user(Session::get('level'))}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Session::get('adm_nama') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>            
        </li>         
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              DATA MASTER
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/dashboard/admin/operator')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DATA OPERATOR</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/dashboard/admin/anggota')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DATA ANGGOTA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/dashboard/admin/kategori_simpanan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>KATEGORI SIMPANAN</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/dashboard/admin/kategori_pinjaman')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>KATEGORI PINJAMAN</p>
              </a>
            </li>                         
          </ul>
        </li>

        <li class="nav-item">
          <a href="/admin/tabungan" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p> TABUNGAN</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/')}}/admin/permohonan-pinjam" class="nav-link">
          <i class="nav-icon fa fa-gavel" aria-hidden="true"></i>
            <p> Permohonan Pinjaman</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-leaf"></i>
            <p> TRANSAKSI</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p> LAPORAN</p>
          </a>
        </li>
         <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-question"></i>
            <p> BANTUAN</p>
          </a>
        </li> 

         <li class="nav-item">
          <a href="{{url('/logout/admin')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p> Keluar</p>
          </a>
        </li>                                      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
