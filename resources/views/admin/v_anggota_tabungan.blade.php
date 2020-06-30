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

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              @foreach($anggota as $a)  
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('lte/dist/img/user4-128x128.jpg')}}" alt="User profile picture">                
                </div>
                <h3 class="profile-username text-center">{{ $a->anggota_nik }}</h3>
                <p class="text-muted text-center">{{ $a->anggota_nama }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Pekerjaan : </b> <a class="float-right">{{ $a->anggota_pekerjaan }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Kelamin : </b> <a class="float-right">{{ $a->anggota_kelamin }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telepon</b> <a class="float-right">{{ $a->anggota_kontak }}</a>
                  </li>                  
                </ul>
              </div>
              @endforeach
            </div>
          
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
              <span>Simpanan Anggota</span> 
              <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#simpanan_tambah">Tambah</button>
              <div id="simpanan_tambah" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">KATEGORI SIMPANAN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/admin/anggota_tabungan_act" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label> JENIS SIMPANAN</label>
                          <select class="form-control" name="jenis" required="required">
                            <option>--Pilih--</option>
                            @foreach($xx as $sim)  
                            <option>{{ $sim->kategori_jenis }}</option>                           
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label> JUMLAH BIAYA</label>
                          <input type="number" name="besar" required="required" class="form-control">
                        </div>                          
                        <br/>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                      </form>
                    </div>
                  </div>
                </div>
              </div>               
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Jenis Tabungan</th>
                      <th>Jumlah</th>                      
                    </tr>
                  </thead>
                  <tbody> 
                    <?php $no=0; ?>
                    @foreach($tabungan as $tab)  
                    <?php $no++ ?>               
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $tab->kategori_jenis }}</td>
                      <td>Rp. {{ number_format($tab->simpanan_jumlah) }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>                 
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



  <!-- Main content -->
<!--   <section class="content">
    <div class="container-fluid">    
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Data anggota</h3>
              <a href="/admin/anggota" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <div class="card card-warning">
                  <div class="card-body">
                    @foreach($anggota as $o)
                    <form role="form" action="/admin/anggota_update" method="post">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>NOMOR PETUGAS</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $o->anggota_id }}">
                            <input type="number" class="form-control" name="nik" value="{{ $o->anggota_nik }}">
                          </div>
                        </div>
                        <div class="col-sm-6">
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
                </div>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section> -->
</div>
@include('admin/footer')