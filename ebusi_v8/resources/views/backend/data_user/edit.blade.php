@extends('backend/layout2.app')

@section('content')
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pengguna</h6>
                 <div class="dropdown no-arrow">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                   </a>
                 </div>
               </div>

               <!-- Card Body -->
               <div class="card-body">
               <form class="form-validate form-horizontal" id="user_form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('edituser') }}/{{$data_user->id}}">
                                    {!! csrf_field() !!}       
                                    <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">Nama User <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="name" name="name"  value="{{  $data_user->name}}" />
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                        <input type="text" class="form-control" id="username" name="username"  value="{{  $data_user->username}}" />
                                        @if ($errors->has('username'))
                                                <span class="text-danger">{{$errors->first('username')}}</span>
                                            @endif
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">E-mail <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                        <input type="text" class="form-control" id="email" name="email" value="{{  $data_user->email}}" />
                                        @if ($errors->has('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                      </div>

                                      <!-- <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" />
                                        @if ($errors->has('password'))
                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>
                                      </div> -->

                                      <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">No Handphone <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="{{  $data_user->nohp}}" />
                                        @if ($errors->has('nohp'))
                                                <span class="text-danger">{{$errors->first('nohp')}}</span>
                                            @endif
                                        </div>
                                      </div>

                                      <!-- <div class="form-group">
                                        <label for="cname" class="control-label col-lg-2">Foto<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                        <img src="{{ url('upload_foto_user') }}/{{ $data_user->foto_user}}" width="40" ></td>
                                        <input type="file" class="form-control" id="foto_user" name="foto_user" value="{{ url('uploads') }}/{{ $data_user->foto_produk}}" />
                                        @if ($errors->has('foto_user'))
                                                <span class="text-danger">{{$errors->first('foto_user')}}</span>
                                            @endif
                                        </div>
                                      </div> -->

                                      
                                      <div class="form-group">
                                        <label for="curl" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                           <textarea name="alamat" id="alamat" class="form-control" >{{  $data_user->alamat}}</textarea>
                                           @if ($errors->has('alamat'))
                                                <span class="text-danger">{{$errors->first('alamat')}}</span>
                                            @endif
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="curl" class="control-label col-lg-2">Hak Akses <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                          <select name="is_admin" id="is_admin" class="form-control">
                                          <option value="0">User</option>
                                          <option value="1">Admin</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="{{url('user-index')}}"><button class="btn btn-default" type="button">Cancel</button></a>
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