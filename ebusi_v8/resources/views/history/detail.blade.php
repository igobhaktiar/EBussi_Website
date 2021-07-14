@extends('layouts.nav_front')

@section('content')
<div id="about-area" class="watch-about-area bg-img ptb-150" style="background-image: url(ezone/assets/img/bg/8.jpg)">
            <div class="container">
        <div class="row">
    
            <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                <h5 class="m-0 font-weight-bold text-success">Detail Pemesanan</h5><br>
                <h3>Sukses Check Out</h3> 
                <h5>Silahkan tunjukkan rincian ini kepada penjual saat melakukan <b>COD</b></h5>
                <!-- <p><a href="{{ url('cetak_detail') }}" target="_blank" class="btn btn-warning btn-sm text-white">Cetak Nota</a></p> -->
                </div>  
                <div class="card-body">
                    <div class="form-row">
                  		<div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pembelian</h4>
                  		  <strong>No. Pembelian: AKI00{{$dataUser[0]->id}}  </strong><br>
                  		  Tanggal: {{$dataUser[0]->tanggal_pesanan}}<br>
                  		  Total: <label style="background-color: #FAEBD7;">Rp. {{number_format($dataUser[0]->jumlah_harga)}}</label>

                 		</div>
                     
                 		<div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pelanggan</h4>
                  		  <b>An. {{$dataUser[0]->name}}</b> <br>
                            {{$dataUser[0]->nohp }} <br>
                            {{ $dataUser[0]->email }}
                  		  <p>
                  		  
                  		  </p>
                 		</div>

                 		<div class="col-md-4">
                  		  <h4>Alamat COD</h4>
                  		  {{$dataUser[0]->alamat }}
                 		</div>
                  	
                        <!-- <h5 class="m-0 font-weight-bold text-success">Detail Pemesanan</h5> -->
                        <!-- CARA NARUH KANAN TULISAN!!! -->
                        <!-- <h5 class="" text-align="right">djf</h5>     -->
                        </div><br>
                        @if(!empty($dataUser[0]))
                        <p align="right">Status Pemesanan :  <br>
                        @if ($dataUser[0]->status == "1")
                        <label style="background-color: #FAEBD7;">Menunggu Konfirmasi</label>
                        @elseif ($dataUser[0]->status == 2)
                        <label style="background-color: #FAEBD7;">Pesanan Diproses</label>
                        @elseif ($dataUser[0]->status == 3)
                        <label style="background-color: #FAEBD7;">Pesanan Dikirim</label>
                        @endif
                         </p>
                    @endif
                      
                    <!-- <p align="right">Tanggal Pesan : {{$dataUser[0]->tanggal_pesanan}}</p> -->
                        <table class="table table-bordered">
                            <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <!-- <th>Kategori</th> -->
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($pesananDetail[0][0] as $detail )
                          <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center"> <img src="{{ url('uploads') }}/{{$detail->foto_produk}}" width="40" ></td>
                            <td>{{$detail->nama_produk}}</td>
                            <td>{{$detail->jumlah}}</td>
                            <td>Rp. {{number_format($detail->harga_produk)}}</td>
                            <td>Rp. {{number_format($detail->jumlah_harga)}}</td>
                          
                          </tr>
                          @endforeach

                    <tr align="center">
                        <th colspan="5" style="text-align: left;">Total Belanja</th>
                        <th  align="center">Rp. {{number_format($dataUser[0]->jumlah_harga)}}</th>
                    </tr>
                    <tr>
                    <!-- <th colspan="5" style="text-align: left;"> <a href="{{ url ('pesan-batal')}}" class="btn btn-danger btn-sm">Batalkan Pesanan</i></a></th> -->
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
