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
          <h1 class="m-0 text-dark">Data Kategori Simpanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/admin">Home</a></li>
            <li class="breadcrumb-item active">Data Kategori Simpanan</li>
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
              <h3 class="card-title">Kategori Simpanan</h3>
              
              <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#kat_tambah">Tambah</button>
              <div id="kat_tambah" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">KATEGORI SIMPANAN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/admin/kategori_simpanan_act" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label> JENIS SIMPANAN</label>
                          <input type="text" name="jenis" required="required" class="form-control">
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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>JENIS</th>
                    <th>JUMLAH BIAYA</th>                   
                    <th>OPSI</th>                   
                  </tr>
                </thead>
                <tbody>
                <?php $no=0 ?> 
                  @foreach($kategori_simpanan as $kat)
                  <?php $no++ ?>                 
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $kat->kategori_jenis }}</td>
                    <td>{{  number_format($kat->kategori_biaya_simpanan) }}</td>                   
                    <td>
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#kat_edit{{$kat->kategori_id}}"><i class="fas fa-pencil-alt"></i> Edit</button>
                      <div id="kat_edit{{$kat->kategori_id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">KATEGORI SIMPANAN</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="/admin/kategori_simpanan_update" method="post" enctype="multipart/form-data"> 
                                {{ csrf_field() }}
                                <table class="table table-bordered table-hover">
                                  <div class="form-group ">
                                    <tr>
                                      <th width="40%"> JENIS SIMPANAN</th>
                                      <th width="1%">:</th>
                                      <td>
                                        <input type="hidden" name="id" class="form-control" value="{{$kat->kategori_id}}">
                                        <input type="text" name="jenis" class="form-control" value="{{$kat->kategori_jenis}}">
                                      </td>
                                    </tr>
                                    <tr>
                                      <th width="40%"> BESAR SIMPANAN</th>
                                      <th width="1%">:</th>
                                      <td>                                     
                                        <input type="number" name="besar" class="form-control" value="{{$kat->kategori_biaya_simpanan}}">
                                      </td>
                                    </tr>
                                  </div>                
                                </table> 
                                <br/>
                                <input type="submit" value="Update" class="btn btn-primary">
                              </form>
                            </div>                      
                          </div>
                        </div>
                      </div>
                      <a class="btn btn-danger btn-sm" href="/admin/kategori_simpanan_hapus/{{ $kat->kategori_id }}"><i class="fas fa-trash"></i> Delete</a>  
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
       </div>
      </div>

    </div>
  </div>
</section>
</div>
@include('admin/footer')