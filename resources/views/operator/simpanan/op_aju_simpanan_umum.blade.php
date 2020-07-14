@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Laman Aju Simpanan Sukarela</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard/anggota')}}">Home</a></li>
                <li class="breadcrumb-item active">Laman Aju Simpanan Sukarela</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
         
          <div class="row">
            <section class="col-lg-6 connectedSortable">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                   
                  Ajukan permohonan
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div>
                <div class="card-body">
                    @php
                        // $dt = App\Model\Anggota::where('anggota_id',Session::get('ang_id'))->first();
                        $ops=App\Model\Simpanan\OpsiSimpanan::where('id',1)->first();
                    @endphp  
                    
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama dan Nik</label>
                            <select name="" class="form-control">
                                   <option value="">Dedi | 985687855</option> 
                            </select>
                          </div> 

                       <div class="form-group">
                        <label for="">Simpanan Pokok</label>
                      <input type="text" id="" class="form-control" value="Rp.{{number_format($ops->simpanan_pokok)}}" disabled>
                      </div> 

                       <div class="form-group">
                        <label for="">Simpanan Wajib/bulan</label>
                      <input type="text" id="" class="form-control" value="Rp.{{number_format($ops->simpanan_wajib)}}" disabled>
                      </div> 

                      <div class="form-group">
                        <label for="">Jumlah Setoran Awal</label>
                      <input type="number" name="sukarela" id="" class="form-control" >
                      </div> 

                      <button class="btn btn-primary float-right" type="submit">Setujui Simpanan Sukarela <i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
              </div>
            </section>
          
          </div>
        </div>
      </section>
    </div>
    
@endsection