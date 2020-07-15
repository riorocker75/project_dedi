@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Detail Pembayaran Pinjaman</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboar/operator')}}">Home</a></li>
                <li class="breadcrumb-item active">Detail Pembayaran Pinjaman</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
         
          <div class="row">
            {{-- bagian form pembayaran --}}
            <section class="col-lg-6 connectedSortable">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                         Form bayar
                    </h3>
                   
                  </div>
                  <div class="card-body">
                    @foreach ($data as $dx)
                        <form action="" method="post">
                            @csrf

                            @php
                                $ang=App\Model\Anggota::where('anggota_id',$dx->anggota_id)->first();
                            @endphp
                            <div class="form-group">
                              <label for="">Nama / Nik Anggota</label>
                            <input type="text" class="form-control" value="{{$ang->anggota_nama}} | " disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Angsuran Wajib/minggu</label>
                              <input type="text" class="form-control" value="Rp.{{number_format($dx->pinjaman_skema_angsuran)}}" disabled>
                              </div>
                        </form>
                    @endforeach 
                  </div>
                </div>
           </section>   
           
           {{-- detail pinjaman --}}
           <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                     Detail Pinjaman
                </h3>
               
              </div>
              <div class="card-body">
              
                   
                       
                        <div class="form-group">
                          <label for="">Kode Pinjaman</label>
                        <input type="text" class="form-control" value="{{$dx->pinjaman_kode}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="">Angsuran Wajib/minggu</label>
                          <input type="text" class="form-control" value="Rp.{{number_format($dx->pinjaman_skema_angsuran)}}" disabled>
                          </div>
                          @php
                              $total_angsur= $dx->pinjaman_skema_angsuran * $dx->pinjaman_angsuran_lama;
                            //   $sg= App\Model\PinjamanTransaksi::where('pinjaman_kode',$dx->pinjaman_kode)->orderBy('id', 'DESC')->first();  
                          @endphp
                          <div class="form-group">
                            <label for="">Total Angsuran</label>
                          <input type="text" class="form-control" value="Rp.{{number_format($total_angsur)}}" disabled>
                          </div>

                          {{-- <div class="form-group">
                            <label for="">Sisa Angsuran</label>
                            <?php if($sg->sisa_bayar > 0){?>
                                <input type="text" class="form-control" value="Rp.{{number_format($sg->sisa_bayar)}}" disabled>
                            <?php }else{ ?>
                                <input type="text" class="form-control" value="Belum Ada transaksi" disabled>
                            <?php } ?>      
                          </div> --}}
                 
                
              </div>
            </div>
       </section>       
           {{-- end detail pinjaman --}}


            {{-- bagian list bayar --}}
            <section class="col-lg-12 connectedSortable">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                   
                       List transaksi pembayaran <b>{{$dx->pinjaman_kode}}</b>
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div>
                <div class="card-body">
                    <table id="data1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Kode Pinjaman</th>
                            <th>Tanggal bayar</th>  
                            <th>Jumlah Bayar</th>
                             <th>Sisa Bayar</th>  
                             <th>Keterangan</th>           
                            <th>Opsi</th>                   
                            </tr>
                        </thead>
                        <tbody> 
                           @foreach ($data_bayar as $dt)
                               
                           <tr>
                               <td>{{$dt->pinjaman_kode}}</td>
                            
                            <td></td>
                       
                            <td> {{date('d-M-Y' , strtotime($dt->pinjaman_tgl))}}</td>
                           <td>Rp. {{number_format($dt->nominal_bayar)}}
                           <small> Kembalian: Rp. {{number_format($dt->kembalian_bayar)}}</small> 
                            </td>
                           <td>Rp. {{number_format($dt->sisa_bayar)}}</td>
                            <td>{{$dt->ket_bayar}}</td>
                            
                           <td>
                                {{-- <a href="" style="padding:0 7px"> <i class="fa fa-eye"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                    
                    
                        </tbody>   
                    </table>
                </div>
              </div>
            </section>
          
          </div>
        </div>
      </section>
    </div>
    
@endsection