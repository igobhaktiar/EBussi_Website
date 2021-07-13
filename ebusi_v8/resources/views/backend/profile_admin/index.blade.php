@extends('backend/layout2.app')
@section('content')

<div class="row">
    
    <div class="col-md-12 mt-3">
    <div class="card">
       
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                <h5 class="m-0 font-weight-bold text-success">My Profile</h5>
                </div>
            
                <!-- <div class="form-group col-md-6">
                <center><label style="background-color: rgb(135 206 250); ">Foto Saya</label></center><br>
                <center><img src="{{ url('upload_foto_user')}}/{{$user->foto_user}}" width="63%" class="img-thumbnail"></center><br><br>
                </div> -->

                <div class="form-group col-md-6">
                  <table class="table mt-3">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                      </tr>

                      <tr>
                         <td>Username</td>
                          <td>:</td>
                          <td>{{ $user->username }}</td>
                      </tr>

                      <tr>
                         <td>E-mail</td>
                         <td>:</td>
                         <td>{{ $user->email }}</td>
                      </tr>

                      <tr>
                         <td>No Hp</td>
                         <td>:</td>
                         <td>{{ $user->nohp }}</td>
                       </tr>

                       <tr>
                         <td>Alamat</td>
                         <td>:</td>
                         <td>{{ $user->alamat }}</td>
                       </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Edit -->
    <div class="card mt-2">
        <div class="card-body">
            <h4><i class="fa fa-pencil-alt"></i> Edit Profile</h4>
         </div>

         <form method="POST" action="{{ url('profile-admin') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>

                    <div class="col-md-6">
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ $user->username }}" required autocomplete="username">
                        
                        @error('username')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nohp" class="col-md-2 col-form-label text-md-right">{{ __('No Hp') }}</label>

                    <div class="col-md-6">
                        <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp }}" required autocomplete="nohp" autofocus>

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-2 col-form-label text-md-right">{{ __('Alamat') }}</label>

                    <div class="col-md-6">
                        <textarea name="alamat" class="form-control @error('nohp') is-invalid @enderror" required>{{$user->alamat}}</textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
@endsection