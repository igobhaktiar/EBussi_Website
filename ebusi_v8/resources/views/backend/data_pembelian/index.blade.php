@extends('backend/layout2.app')

@section('content')

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
               @if ($message = Session::get('success'))
                <div class="alert alert-success">
                   <p>{{ $message }}</p>
                </div>
                @endif
                
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-primary">Data Pembelian</h5><hr>
                  <a href="{{url('cetak-pembelian')}}" target="_blank"><button class="btn btn-primary" type="button">
                    <i class="fa fa-print"> Cetak Data </i></button></a>
                  
                 <br><br>
                    <div class="table-responsive">
                    <table class="table table-bordered data-table">
                    <tbody>
                            <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status Pembelian</th>
                            <th>Total</th>
                            <th>Aksi</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                        @foreach ($data as $pembelian => $item)
                       
                        
                        <tr>
                            <td>{{$data->firstItem() + $pembelian}}</td>
                            
                            <td>{{$item->name}}</td>
                           
                            <td>{{$item->tanggal_pesanan}}</td>
                            <td>
                            @if($item->status == 1)
                            <label style="background-color: #FAEBD7;">Menunggu Konfirmasi</label>
                            @elseif ($item->status == 2)
                            Pesanan Diproses
                            @elseif ($item->status == 3)
                            Pesanan Dikirim
                            @endif
                            </td>
                            <td>Rp. {{ number_format($item->jumlah_harga)}}</td>
                           
                            <td><a href="{{url('detail-pembelian')}}/{{$item->id}}" class="btn btn-primary btn-sm">Detail</a></td>
                        </tr>   
                        
                        @endforeach                      
                        </tbody>
                    </table>
                    <div class="pull-right">
                       {{ $data->links() }}
                    </div>
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>

@endsection