@extends('layouts.main_app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Anggota</li>
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
              <h3 class="card-title">Data Anggota Koperasi</h3>             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>KELAMIN</th>
                    <th>KONTAK</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php $no=0; ?>
                  @foreach($anggota as $a)  
                  <?php $no++ ?>               
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $a->anggota_nik }}</td>
                    <td>{{ $a->anggota_nama }}</td>
                    <td>{{ $a->anggota_kelamin }}</td>
                    <td>{{ $a->anggota_kontak }}</td>
                    <td>                    
                     <a class="btn btn-danger btn-sm" href="/admin/anggota_hapus/{{ $a->anggota_id }}"><i class="fas fa-trash"></i> Delete</a>   
                     <a class="btn btn-success btn-sm" href="anggota_tabungan/{{ $a->anggota_id }}"><i class="far fa-money-bill-alt"></i> Tabungan</a>                   
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


@endsection