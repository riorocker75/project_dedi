@extends('layouts.main_app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Operator</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Operator</li>
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
              <h3 class="card-title">Tambah Data Operator</h3>
              <a href="operator" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                  <div class="card-body">
                    <form role="form" action="operator_act" method="post">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>KODE PEGAWAI</label>
                            <input type="text" class="form-control" name="kode_pagawai" required="required" placeholder="Nomor ....">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>NOMOR PETUGAS</label>
                            <input type="number" class="form-control" name="nomor_pegawai" required="required" placeholder="Nomor ....">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>NAMA OPERATOR</label>
                            <input type="text" class="form-control" name="nama" required="required" placeholder="Nama ...">
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
                            <input type="date" name="tanggal_lahir" class="form-control" required="required">                        
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>TEMPAT LAHIR</label>
                            <textarea class="form-control" name="tempat_lahir" rows="3" required="required"></textarea>
                          </div>
                        </div>
                         <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>ALAMAT LENGKAP</label>
                            <textarea class="form-control" name="alamat" rows="3" required="required"></textarea>
                          </div>
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>KONTAK</label>
                            <input type="number" class="form-control" name="kontak" placeholder="08217xxxx" required="required">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>USERNAME</label>
                            <input type="text" class="form-control" name="username" placeholder="Usename .." required="required">
                          </div>
                        </div> 
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="password" class="form-control" name="password">
                            <p style="color: red">*input jika akan diganti</p>
                          </div>
                        </div>
                      </div>                                                          
                        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">                      
                    </form>
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
@endsection