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
                    <a href="{{url('cetak-produk')}}" target="_blank"><button class="btn btn-primary" type="button">
                    <i class="fa fa-print"> Cetak Data </i></button></a>
                 <br><br>
                 <!-- peringatan stok -->
                 @foreach ($data as $produk => $item)
                    @if($item->stok <= 3)
                        <script>
                         $(document).ready(function(){
                          $('#pesan_sedia').css("color","red");
                          $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
                        });
                      </script>
                      <?php
                      
                      echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok <a style='color:red'>".$item->nama_produk."</a> yang tersisa kurang dari 3. Silahkan cek dan tambah stok lagi </div>";
                      ?>
                      @endif
                 @endforeach
                
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
                        
                        @foreach ($data as $produk => $item)
                        <tr>
                            <td>{{$data->firstItem() + $produk}}</td>
                            <td>{{$item->nama_produk}}</td>
                            <td>{{$item->nama_kategori}}</td>
                            <td>{{$item->stok}} 

                            <!-- Label belakang -->
                            @if ($item->kategori == "Buah")
                            buah
                            @elseif ($item->kategori == "Sayur")
                            ikat
                            @endif


                            </td>
                            <td>{{$item->beratisi_produk}} kg</td>
                            <td>Rp. {{number_format($item->harga_produk)}}</td>
                            <td>
                                <img src="{{ url('uploads') }}/{{ $item->foto_produk}}" width="40" >
                            </td>
                            <td>{{$item->keterangan}}</td>

                            <td>
                            <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="{{url('edit')}}/{{$item->id}}">
                                    <i class="fa fa-edit"></i></a>

                            <form action="{{url('destroy')}}/{{$item->id}}" method="post" class="form-inline">
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
                    <div class="pull-right">
                       {{ $data->links() }}
                    </div>
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>

@endsection
