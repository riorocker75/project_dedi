<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Pinjaman</title>
     <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css') }}">

     <link rel="stylesheet" href="{{asset('css/custom.css') }}">

</head>
<body>
  @foreach ($simulasi as $sm)
      
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tabel Angsuran Pinjaman </h1>
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
                    <div class="detail-pinjam-header">
                        <div class="detail-1 float-right">
                            <table class="tabel-simulasi ">
                                <tbody>
                                    <tr>
                                        <td scope="row">Bunga Pinjaman</td>
                                        <td >{{$sm->pinjaman_bunga}}%</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Jangka Waktu Pinjam</td>
                                        <td>{{$sm->pinjaman_angsuran_lama}} bulan</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Pokok Pinjam</td>
                                    <td>{{$sm->pinjaman_jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Tanggal Pinjam</td>
                                    <td>{{ format_tanggal(date('Y-m-d', strtotime($sm->pinjaman_tgl)))}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Angsuran Perbulan</td>
                                        <td>Rp. {{number_format($sm->pinjaman_skema_angsuran)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                          
                           
                        </div>
                      
                    </div>

                    <div class="detail-2">
                        <table class="table tabel-simulasi-2 table-bordered table-striped float-right">
                            <thead>
                                <tr>
                                    <th>Pokok Pinjaman</th>
                                    <th>Bunga</th>
                                    <th>Total Pinjaman</th>
    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                     <td>Rp. {{number_format($sm->pinjaman_jumlah)}}</td>
                                    <td>{{ $sm->pinjaman_bunga}}%</td>
                                    <td>Rp.<?php $ck=$sm->pinjaman_skema_angsuran * $sm->pinjaman_angsuran_lama; echo number_format($ck);?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    

                    <div class="card-body">
                   
                      <table class="table table-bordered table-striped">
                       
                        @php
                            $no=1;
                            $ntahun = 1;
                            $ntahun1 = 1;
    
                            $bulan=$sm->pinjaman_angsuran_lama;
                            $bayar=$ck;
                            $angsuran =$sm->pinjaman_skema_angsuran;
                            $end = strtotime(date($sm->pinjaman_tgl));
                            $start = $month = strtotime("+1 months", $end);
    
                            
                        @endphp
                        
                        <thead>
                           <div style="padding:15px;text-align:center;font-size:16px;border:1px solid #c1c2c3">
                              <b> Tabel Angsuran</b>
                           </div>
                            <tr>
                                <th>Bulan Ke</th>
                                <th>Bulan</th>
                                <th>Total Pinjaman</th>
                                <th>Angsuran Perbulan</th>
                                <th>Saldo Total Pinjaman</th>
    
                            </tr>
                        </thead>
                        @for ($i = 0; $i < $bulan; $i++)
                        
                        <tbody> 
                            <tr>
                                <td>{{$no++}}</td>   
                            <td>
                                @php
                                    echo date("Y-m-d", $month);
                                 $month = strtotime("+1 month", $month);
                                @endphp
                                
    
                            </td>
                           {{-- total pinjaman --}}
                            <td>
                                <?php
                                do {
                                    $ntahun1++;
                                    $bayar1=$bayar+$angsuran;
                                    $bayar1 -= $angsuran;
                                ?>
                             {{number_format($bayar1)}}
                             <?php   }while($ntahun1 < 0); ?>  
                            </td>
                            {{-- end total pinjaman --}}
    
                            <td>Rp. {{number_format($angsuran)}}</td>
    
                            {{-- saldo Pinjaman --}}
                            <td>
                                <?php
                                do {
                                    $ntahun++;
                                    $bayar -= $angsuran;
                            ?>
                             {{number_format($bayar)}}
                             <?php   }while($ntahun < 0); ?>  
                            </td>
                            {{-- end saldo pinjaman --}}
                        </tbody>
                        
                        @endfor 
                    </table> 
             
                    </div>
                  </div>
                </section>
              
              </div>
            </div>
          </section>
        </div>
    

        @endforeach








    <script src="{{asset('lte/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{asset('lte/dist/js/adminlte.js') }}"></script>

    <script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{asset('js/data_table.js') }}"></script>
    <script src="{{asset('js/custom.js') }}"></script>
    
</body>
</html>