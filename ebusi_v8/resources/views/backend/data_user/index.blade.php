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
                  <h5 class="m-0 font-weight-bold text-primary">Data Pengguna</h5><hr>

                  <!-- <a href="{{url('tambah_user')}}"><button class="btn btn-primary" type="button">
                    <i class="fa fa-plus"> Tambah </i></button></a> -->
                    <a href="{{url('cetak-user')}}" target="_blank"><button class="btn btn-primary" type="button">
                    <i class="fa fa-print"> Cetak Data </i></button></a>
                    <!-- <div class="row">
                    <div class="form-group col-md-4">
                   
                    <input type="search" class="form-control mr-sm-2" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             
                    </div>
                    </div> -->
                    
                 <br><br>
                  <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <tbody>
                            <tr>
                            <th>No</th>
                            <!-- <th>Foto</th> -->
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Waktu Daftar</th>
                            <th>Aksi</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                         @foreach ($data_user as $key => $user)
                        <tr>
                            <td>{{$data_user->firstItem() + $key}}</td>  
                            <!-- <td>
                            dikasih kondisi, apabila foto ada dan tidak ada
                            <img src="{{ url('upload_foto_user') }}/{{ $user->foto_user}}" width="40" ></td> -->
                            
                            <td>{{$user->name}}</td>  
                            <td>{{$user->username}}</td>  
                            <td>{{$user->email}}</td>  
                            <td>{{$user->created_at}}</td>
                           
                            <td>
                            <a class="btn btn-warning btn-sm" href="{{url('edituser')}}/{{$user->id}}">
                                    <i class="fa fa-edit"></i></a>
                            <form action="{{url('hapus')}}/{{$user->id}}" method="post" class="form-inline">
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
                   
                  </div>
                  <div class="pull-right">
                       {{ $data_user->links() }}
                    </div>
                 </form>
                
                
                 
               </div>

             </div>
           </div>

           @push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush
@endsection