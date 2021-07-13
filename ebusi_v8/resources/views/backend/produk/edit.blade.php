<?php

use App\Models\KategoriProduk;
$kategori = KategoriProduk::all();
?>
@extends('backend/layout2.app')

@section('content')
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Ubah Data Produk</h6>
                 <div class="dropdown no-arrow">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                   </a>
                 </div>
               </div>

               <!-- Card Body -->
               <div class="card-body">
               <form class="form-validate form-horizontal" id="editproduk_form" method="POST" enctype="multipart/form-data" action="{{ url('edit') }}/{{$produks->id}}">
                {!! csrf_field() !!}  

                <div class="form-group">
                 <label for="cname" class="control-label col-lg-2">Nama Produk <span class="required">*</span></label>
                  <div class="col-lg-10">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{  $produks->nama_produk}}" />
                    @if ($errors->has('nama_produk'))
                      <span class="text-danger">{{$errors->first('nama_produk')}}</span>
                    @endif
                  </div>
                </div>

                   <div class="form-group">
                   <label for="cname" class="control-label col-lg-2">Kategori <span class="required">*</span></label>
                    <div class="col-lg-10">
                     <select name="kategori" id="kategori" class="form-control">
                      @foreach ($kategori as $item)
                         <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                      @endforeach
                      </select>
                      @if ($errors->has('kategori'))
                         <span class="text-danger">{{$errors->first('kategori')}}</span>
                      @endif
                    </div>
                    </div>

                    <div class="form-group">
                     <label for="curl" class="control-label col-lg-2">Stok <span class="required">*</span></label>
                     <div class="col-lg-10">
                     <input type="number" class="form-control" id="stok" name="stok" value="{{  $produks->stok}}" />
                       @if ($errors->has('stok'))
                         <span class="text-danger">{{$errors->first('stok')}}</span>
                       @endif
                     </div>
                     </div>

                     <div class="form-group">
                       <label for="curl" class="control-label col-lg-2">Berat Isi Produk <span class="required">*</span></label>
                        <div class="col-lg-10">
                        <input type="number" class="form-control" id="beratisi_produk" name="beratisi_produk" value="{{  $produks->beratisi_produk}}">
                          @if ($errors->has('beratisi_produk'))
                          <span class="text-danger">{{$errors->first('beratisi_produk')}}</span>
                          @endif
                        </div>
                       </div>

                      <div class="form-group">
                        <label for="curl" class="control-label col-lg-2">Harga Produk <span class="required">*</span></label>
                          <div class="col-lg-10">
                          <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{  $produks->harga_produk}}">
                              @if ($errors->has('harga_produk'))
                                                <span class="text-danger">{{$errors->first('harga_produk')}}</span>
                                            @endif
                          </div>
                     </div>

                     <div class="form-group">
                        <label for="curl" class="control-label col-lg-2">Foto Produk <span class="required">*</span></label>
                         <div class="col-lg-10">
                         <img src="{{ url('uploads') }}/{{ $produks->foto_produk}}" width="40" >
                                            <input type="file" class="form-control" id="foto_produk" name="foto_produk" value="{{ url('uploads') }}/{{ $produks->foto_produk}}">
                                            @if ($errors->has('foto_produk'))
                                                <span class="text-danger">{{$errors->first('foto_produk')}}</span>
                                            @endif
                        </div>
                     </div>

                     <div class="form-group">
                         <label for="curl" class="control-label col-lg-2">Keterangan <span class="required">*</span></label>
                            <div class="col-lg-10">
                            <textarea name="keterangan" id="keterangan" class="form-control" required>{{  $produks->nama_produk}}</textarea>
                                           @if ($errors->has('keterangan'))
                                                <span class="text-danger">{{$errors->first('keterangan')}}</span>
                                            @endif
                            </div>
                      </div>
                        
                         <div class="form-group">
                             <div class="col-lg-offset-2 col-lg-10">
                             <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="{{url('index-read')}}"><button class="btn btn-default" type="button">Cancel</button></a>
                                        </div>
                        </div>
                                    
                                        
                        </form>
                        </div>


           </div>
@endsection
@push('content-css')
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }} " rel="stylesheet" />
@endpush
@push('content-js')
<script scr="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $('#tahun_masuk').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    }); $('#tahun_keluar').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>
@endpush