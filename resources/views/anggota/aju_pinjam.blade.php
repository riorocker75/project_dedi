@extends('layouts.main_app')

@section('content')
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ajukan Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/anggota')}}">Home</a></li>
            <li class="breadcrumb-item active">Ajukan Peminjaman</li>
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
               
              Ajukan
              </h3>
              <div class="card-tools">
               
              </div>
            </div>
            <div class="card-body">
            <form action="{{url('/anggota/ajukan-pact')}}" method="post">
              {{ csrf_field() }}

              <div class="row">
                  <div class="col-lg-7">
                    <div class="form-group">

                      <label>No. Pinjaman</label>
                      <?php $rand="PNJ-".rand('1000','9999');?>
                    <input type="text" class="form-control" name="no_pinjam" value="{{ $rand }}" disabled>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="form-group">
                      <label>Jumlah Pinjaman</label>
                    <input type="number" class="form-control" name="jlh_pinjam" >
                    </div>

                  </div>

              </div>

              </form>
            </div>
          </div>
        </section>
      
      </div>
    </div>
  </section>
</div> 
@endsection