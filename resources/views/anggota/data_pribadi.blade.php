@extends('layouts.main_app')

@section('content')

@foreach ($pribadi as $pr)

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Pribadi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/anggota')}}">Home</a></li>
            <li class="breadcrumb-item active">Data Pribadi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
     
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
               
               Ubah Data
              </h3>
              <div class="card-tools">
               
              </div>
            </div>
            <div class="card-body">
            <form role="form" action="/anggota/data-pribadi-update/{{$pr->anggota_id}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nomot Induk Kependudukan (NIK)</label>
                          {{-- <input type="hidden" class="form-control" name="id" value="{{ $pr->anggota_id }}"> --}}
                          <input type="number" class="form-control" name="nik" value="{{ $pr->anggota_nik }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>NAMA</label>
                          <input type="text" class="form-control" name="nama" value="{{ $pr->anggota_nama }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>JENIS KELAMIN</label>
                          <input type="text" class="form-control" value="{{ ucfirst($pr->anggota_kelamin) }}" disabled>
                                                     
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>TANGGAL LAHIR</label>
                          <input type="date" name="tanggal_lahir" class="form-control" value="<?php if($pr->anggota_tanggal_lahir == ""){echo date('Y-m-d');}else{echo $pr->anggota_tanggal_lahir;}?>">                        
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>TEMPAT LAHIR</label>
                          <textarea class="form-control" name="tempat_lahir" rows="2">{{$pr->anggota_tempat_lahir}}</textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>ALAMAT KTP</label>
                          <textarea class="form-control" name="alamat_ktp" rows="2">{{$pr->anggota_alamat_ktp}}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>KONTAK</label>
                          <input type="number" class="form-control" name="kontak" value="{{ $pr->anggota_kontak }}">
                        </div>
                      </div> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>PEKERJAAN</label>
                          <input type="text" class="form-control" name="pekerjaan" value="{{ $pr->anggota_pekerjaan}}" required="required">
                        </div>
                      </div> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>ALAMAT SEKARANG</label>
                          <textarea class="form-control" name="alamat_sekarang" rows="2" >{{$pr->anggota_alamat_sekarang}}</textarea>
                        </div>
                      </div>                       
                    </div>                                                          
                    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">                      
                  </form>
            </div>
          </div>
        </section>
      
      </div>
    </div>
  </section>
   @endforeach 
@endsection