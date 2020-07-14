@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan Simpanan Berjangka</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan Simpanan Berjangka</li>
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
               
              	Simpanan Berjangka
              </h3>
              <div class="card-tools">
                <a data-toggle="modal" data-target="#tambahdeposit"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </section>
      
      </div>
    </div>
  </section>
</div>

{{-- modal tambah deposit --}}
<div class="modal" tabindex="-1" role="dialog" id="tambahdeposit">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Simpanan Berjangka</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('')}}" method="post">
        @csrf
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form> 
    </div>
  </div>
</div>

@endsection