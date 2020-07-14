@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Laman Aju Simpanan Berjangka</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard/anggota')}}">Home</a></li>
                <li class="breadcrumb-item active">Laman Aju Simpanan Berjangka</li>
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
                  
                    
                    <form action="" method="post">
                        @csrf
                       <div class="form-group">
                         <label for="">Nama</label>
                       <input type="text" name="nama" id="" class="form-control" value="Dedi Nik:985687855" disabled>
                       </div> 

                       {{-- buat ajax cek di simpanan berjangka detailnya  --}}
                       <div class="form-group">
                        <label for="">Simpanan Berjangka</label>
                        <select name="nominal" class="form-control">
                            <option value="">Rp. 5.000.000</option>
                            <option value="">--pilih nominal deposit--</option>

                        </select>
                         </div> 

                         {{-- disini dibuat show data aja --}}
                         <div class="form-group">
                            <label for="">Periode</label>
                            <input type="text" id="" class="form-control" value="12 bulan" disabled>
                           
                        </div> 
                        <div class="form-group">
                            <label for="">Bagi Hasil Per 12bulan</label>
                            <input type="text" id="" class="form-control" value="10%" disabled>
                           
                        </div> 

                        <div class="form-group">
                            <label for="">Nisbah perbulan</label>
                            <input type="text" id="" class="form-control" value="Rp.41.667" disabled>
                           
                        </div> 
                      {{-- end show data ajax --}}

                      <button class="btn btn-primary float-right" type="submit">Setujui Simpanan Berjangka <i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
              </div>
            </section>
          
          </div>
        </div>
      </section>
    </div>
    
@endsection