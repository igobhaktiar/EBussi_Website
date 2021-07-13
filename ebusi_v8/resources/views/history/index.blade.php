@extends('layouts.nav_front')

@section('content')
<div id="about-area" class="watch-about-area bg-img ptb-150" style="background-image: url(ezone/assets/img/bg/8.jpg)">
            <div class="container">
        <div class="row">
    
            <div class="col-md-12 mt-3">
            <div class="card">
               
                <div class="card-body">
                    <div class="form-row">
                        
                        <h5 class="m-0 font-weight-bold text-success">Riwayat Pemesanan</h5>
                        <!-- CARA NARUH KANAN TULISAN!!! -->
                        <!-- <h5 class="" text-align="right">djf</h5>     -->
                        </div>
                        <br>
                        <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Detail</th>
                            
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    @foreach ($pesanans as $pesanan)
                    <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->tanggal_pesanan }}</td>
                            <td>
                            @if($pesanan->status == 1)
                            Menunggu Konfirmasi
                            @elseif ($pesanan->status == 2)
                            Pesanan Diproses
                            @elseif ($pesanan->status == 3)
                            Pesanan Dikirim
                            @endif
                            </td>
                            <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                            <td><a href="{{ url ('history') }}/{{ $pesanan->id}}" class="btn btn-info btn-sm"><i class="pe-7s-info"></i></a>
                           
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
    </div>
</div>
@endsection
