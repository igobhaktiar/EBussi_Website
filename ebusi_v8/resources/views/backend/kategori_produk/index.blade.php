@extends('backend/layout2.app')
@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
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
                
                <!-- form nambah kategori -->
                <form class="form-validate form-horizontal" id="kat_produk_form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('kat_store') }}">
                                    {!! csrf_field() !!}      
                  <h5 class="m-0 font-weight-bold text-primary">Data Kategori Produk</h5><hr>
                  <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan Kategori Baru" value="{{ old('nama_kategori') }}">
                        @if ($errors->has('nama_kategori'))
                           <span class="text-danger">{{$errors->first('nama_kategori')}}</span>
                       @endif
                    </div>
                    <div class="form">
                      <button type="submit" name="tambah" class="btn btn-primary pull-right"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                    </div>
                  </div>
                </form>
                  <!-- <a href="{{ url('tambah') }}"><button class="btn btn-primary" type="button">
                     <i class="fa fa-plus"> Tambah </i></button></a> -->
                 <br><br>
                  <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <tbody>
                            <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Waktu Tambah</th>
                            <th>Aksi</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                         @foreach ($kategori_produks as $key => $kat_produk)
                        <tr>
                            <td>{{$kategori_produks->firstItem() + $key}}</td>  
                            <td>{{$kat_produk->nama_kategori}}</td>  
                            <td>{{$kat_produk->created_at}}</td>
                            <td>
                            <form action="{{url('hapusy')}}/{{$kat_produk->id}}" method="post" class="form-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data?');">
                                <i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>  
                        @endforeach           
                        </tbody>
                    </table>
                    <div class="pull-right">
                       {{ $kategori_produks->links() }}
                    </div>
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>


@endsection
@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">




@endpush