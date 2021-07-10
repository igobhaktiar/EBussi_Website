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
                  <h5 class="m-0 font-weight-bold text-primary">Data Produk</h5><hr>

                  <a href="{{ url('create') }}"><button class="btn btn-primary" type="button">
                    <i class="fa fa-plus"> Tambah </i></button></a>
                  <a href="#" target="_blank"><button class="btn btn-primary" type="button">
                    <i class="fa fa-print"> Cetak Data </i></button></a>
                 <br><br>
                
                  <div class="table-responsive">
                    <table class="table table-bordered data-table">
                    <tbody>
                            <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Berat Isi Produk</th>
                            <th>Harga Produk</th>
                            <th>Foto Produk</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                        
                        @foreach ($produks as $produk)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$produk->nama_produk}}</td>
                            <td>{{$produk->kategori}}</td>
                            <td>{{$produk->stok}} 

                            <!-- Label belakang -->
                            @if ($produk->kategori == "Buah")
                            buah
                            @elseif ($produk->kategori == "Sayur")
                            ikat
                            @endif


                            </td>
                            <td>{{$produk->beratisi_produk}} kg</td>
                            <td>Rp. {{number_format($produk->harga_produk)}}</td>
                            <td>
                                <img src="{{ url('uploads') }}/{{ $produk->foto_produk}}" width="40" >
                            </td>
                            <td>{{$produk->keterangan}}</td>

                            <td>
                            <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="#">
                                    <i class="fa fa-edit"></i></a>

                            <form action="#" method="post" class="form-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data?');">
                                <i class="fa fa-trash"></i></button>
                            </form>
                                
                            </div>
                            </td>
                        </tr>   
                          @endforeach

                        </tbody>
                    </table>
                   
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>

@endsection
