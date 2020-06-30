@include ('admin/header')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('admin/sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data anggota</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">    
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Data anggota</h3>
              <a href="/admin/anggota" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                  <div class="card-body">
                    @foreach($anggota as $o)
                    <form role="form" action="/admin/anggota_update" method="post">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>NOMOR PETUGAS</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $o->anggota_id }}">
                            <input type="number" class="form-control" name="nik" value="{{ $o->anggota_nik }}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>NAMA anggota</label>
                            <input type="text" class="form-control" name="nama" value="{{ $o->anggota_nama }}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>JENIS KELAMIN</label>
                            <select class="form-control" name="kelamin" required="required">
                              <option value="">--Pilih--</option>
                              <option value="Laki - Laki">Laki - Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>                            
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>TANGGAL LAHIR</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{$o->anggota_tanggal_lahir}}">                        
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>TEMPAT LAHIR</label>
                            <textarea class="form-control" name="tempat_lahir" rows="2">{{$o->anggota_tempat_lahir}}</textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>ALAMAT KTP</label>
                            <textarea class="form-control" name="alamat_ktp" rows="2">{{$o->anggota_alamat_ktp}}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>KONTAK</label>
                            <input type="number" class="form-control" name="kontak" value="{{ $o->anggota_kontak }}">
                          </div>
                        </div> 
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>PEKERJAAN</label>
                            <input type="text" class="form-control" name="pekerjaan" value="{{ $o->anggota_pekerjaan}}" required="required">
                          </div>
                        </div> 
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>ALAMAT SEKARANG</label>
                            <textarea class="form-control" name="alamat_sekarang" rows="2" >{{$o->anggota_alamat_sekarang}}</textarea>
                          </div>
                        </div>                       
                      </div>                                                          
                      <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">                      
                    </form>
                    @endforeach
                  </div>
                  <!-- /.card-body -->
                </div>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
@include('admin/footer')