@extends('layouts.main_app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Transaksi Pembiayaan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi Pembiayaan</li>
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
                   
                   Seluruh Transaksi Pembiayaan
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div>
                <div class="card-body">
                    <table id="data1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Kode Pembiayaan</th>
                            <th>Jumlah Pembiayaan</th>
                            <th>Skema Angsuran</th>  
                            <th>Total Angsuran</th>                   
                            <th>Lama Angsuran</th>                   
                            <th>Status </th>                   
                            <th>Opsi</th>                   
                          </tr>
                        </thead>
                        <tbody> 
                            
                            {{-- data 1 --}}
                            <tr>
                                <td>PNJ-8895
                                    <br>
                                    <small class="tgl-text">14-07-2020</small>
                                </td>
                                <td>Rp. 5.000.0000</td>
                                <td>Rp. 124.000/minggu</td>
                                <td>Rp. 6.200.000</td>
                                <td>50 minggu</td>
                                <td><label class="badge badge-primary">Masa pembayaran</label></td>
                                <td>
                                <a href="" style="padding:0 7px"> <i class="fa fa-eye"></i></a>
                                <a href="" target="__blank"> <i class="fas fa-money-bill"></i></a>
                                </td>
                            </tr>

                            {{-- data 2 --}}
                            <tr>
                                <td>PNJ-6652
                                    <br>
                                     <small class="tgl-text">14-07-2020</small>
                                </td>
                                <td>Rp. 3.000.0000</td>
                                <td>Rp. 74.400/minggu</td>
                                <td>Rp. 3.720.000</td>

                                <td>50 minggu</td>
                                <td><label class="badge badge-primary">Masa pembayaran</label></td>
                                <td>
                                <a href="" style="padding:0 7px"> <i class="fa fa-eye"></i></a>
                                <a href="" target="__blank"> <i class="fas fa-money-bill"></i></a>
                                </td>
                            </tr>

                             {{-- data 3 --}}
                             <tr>
                                <td>PNJ-6652
                                    <br>
                                    <small class="tgl-text">14-07-2020</small>
                                </td>
                                <td>Rp. 10.000.0000</td>
                                <td>Rp. 242.000/minggu</td>
                                <td>Rp. 12.100.000</td>
                                <td>50 minggu</td>
                                <td><label class="badge badge-primary">Masa pembayaran</label></td>
                                <td>
                                <a href="" style="padding:0 7px"> <i class="fa fa-eye"></i></a>
                                <a href="" target="__blank"> <i class="fas fa-money-bill"></i></a>
                                </td>
                            </tr>
    
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