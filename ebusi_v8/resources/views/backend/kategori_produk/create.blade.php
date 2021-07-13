@extends('backend/layout2.app')

@section('content')
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kategori Produk</h6>
                 <div class="dropdown no-arrow">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                   </a>
                 </div>
               </div>

               <!-- Card Body -->
               <div class="card-body">
               <form class="form-validate form-horizontal" id="kat_produk_form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('kat_store') }}">
                                    {!! csrf_field() !!}      

                <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Nama Kategori Produk <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" />
                                            @if ($errors->has('nama_kategori'))
                                                <span class="text-danger">{{$errors->first('nama_kategori')}}</span>
                                            @endif
                                        </div>
                </div>
    
                   


                
                         <div class="form-group">
                             <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="{{url('kategori-index')}}"><button class="btn btn-default" type="button">Cancel</button></a>
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