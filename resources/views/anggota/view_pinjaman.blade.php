@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Lihat Pinjaman</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/anggota/data-pinjaman/'.Session::get('ang_id').'')}}">Riwayat Pinjaman</a></li>
                <li class="breadcrumb-item active">Lihat Pinjaman</li>
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
                   
                   Cek 
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div>
                <div class="card-body">
                    @foreach ($data as $dpj)
                    <div class="row">
                        {{-- data pinjaman --}}
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Kode Pinjaman</label>
                                <input type="text" class="form-control"  value="{{ $dpj->pinjaman_kode }}" disabled>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Ajukan Pinjaman</label>
                                <input type="text" class="form-control" value="{{ date('d-M-Y',strtotime($dpj->pinjaman_tgl)) }}" disabled>
                              </div>
                              <div class="form-group">
                                <label>Nomimal Pinjaman</label>
                                <input type="text" class="form-control" value="Rp.{{ number_format($dpj->pinjaman_jumlah)}}" disabled>
                              </div>

                              <div class="form-group">
                                <label>Angsuran per bulan</label>
                                <input type="text" class="form-control" value="Rp.{{ number_format($dpj->pinjaman_skema_angsuran)}}" disabled>
                              </div>

                              <div class="form-group">
                                <label>Jangka Angsuran</label>
                                <input type="text" class="form-control" value="{{$dpj->pinjaman_angsuran_lama}} bulan" disabled>
                              </div>

                              <div class="form-group">
                                <label>Total Bunga</label>
                                <input type="text" class="form-control" value="{{$dpj->pinjaman_bunga}} %" disabled>
                              </div>
                        </div> 
                        
                        <div class="col-lg-6 col-md-12 col-12">
                            @if ($dpj->pinjaman_ket != "")
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" value="{{status_pinjaman($dpj->pinjaman_status)}} " disabled>
                              </div>

                              <div class="form-group">
                                <label>Keterangan</label>
                               <textarea class="form-control" rows="3" disabled>{{$dpj->pinjaman_ket}}</textarea>
                              </div>
                            @else

                            @endif
                        </div> 
                    </div> 
                    @endforeach
                </div>
              </div>
            </section>
          
          </div>
        </div>
      </section>
    </div>
    
    
@endsection