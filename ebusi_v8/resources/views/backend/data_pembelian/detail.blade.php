@extends('backend/layout2.app')

@section('content')
<!-- <pre><?php //print_r($row); ?></pre>  -->
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 
                  <h5 class="m-0 font-weight-bold text-primary">Data Detail Pembelian</h5><hr>
               
                    <div class="form-row">
                    <div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pembelian</h4>
                  		  <strong>No. Pembelian: AKI00{{$dataUser[0]->id}}  </strong><br>
                  		  Tanggal: {{$dataUser[0]->tanggal_pesanan}}<br>
                  		  Total: <label style="background-color: #FAEBD7;">Rp. {{number_format($dataUser[0]->jumlah_harga)}}</label>

                 		</div>

                         <div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pelanggan</h4>
                  		  <b>An.  {{$dataUser[0]->name}}</b> <br>
                            {{$dataUser[0]->nohp }} <br>
                            {{ $dataUser[0]->email }}
                  		  </div>

                            <div class="col-md-4">
                  		  <h4>Alamat COD</h4>
                  		  {{$dataUser[0]->alamat }} 
                 		</div>
                    </div>
                   
                    @if(!empty($dataUser[0]))
                        <p align="right">Status Pemesanan :  <br>
                        @if ($dataUser[0]->status == "1")
                        <label style="background-color: #FAEBD7;">Menunggu Konfirmasi</label>
                        @elseif ($dataUser[0]->status == 2)
                        <label style="background-color: #FAEBD7;">Pesanan Diproses</label>
                        @elseif ($dataUser[0]->status == 3)
                        <label style="background-color: #FAEBD7;">Pesanan Dikirim</label>
                        @endif
                         </p>
                    @endif
                    <!-- <p align="right">Tanggal Pesan : {{$dataUser[0]->tanggal_pesanan}}</p> -->
                        <table class="table table-bordered">
                            <thead>
                              <tr class="text-center">
                                  <th>No</th>
                                  <th>Foto Produk</th>
                                  <th>Nama Produk</th>
                                  <!-- <th>Kategori</th> -->
                                  <th>Jumlah</th>
                                  <th>Harga</th>
                                  <th>Total Harga</th>
                              </tr>
                          </thead>

                          <tbody>
                          
                          @foreach($pesananDetail[0][0] as $detail )
                          <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center"> <img src="{{ url('uploads') }}/{{$detail->foto_produk}}" width="40" ></td>
                            <td>{{$detail->nama_produk}}</td>
                            <td>{{$detail->jumlah}}</td>
                            <td>Rp. {{number_format($detail->harga_produk)}}</td>
                            <td>Rp. {{number_format($detail->jumlah_harga)}}</td>
                          
                          </tr>
                          @endforeach
          

                          </tbody>

                          <tfoot>
                          <tr >
                              <th colspan="5">  Total Harga</th>
                              <th class="text-center">Rp. {{number_format($dataUser[0]->jumlah_harga)}}</th>
                              <!-- <td class="text-center"> -->
                                  <!-- <a href="{{ url('konfirmasi-check-out')}}" class="btn btn-success" onclick="return confirm('Anda yakin untuk Check Out produk?');">
                                  <i class="fa fa-shopping-cart"></i> Check Out
                                  </a> -->
                              <!-- </td> -->
                          </tr>
                        </tfoot>
                        </table>
                
                 
                    <form method="post" action="{{url('edit-status')}}/{{$dataUser[0]->id}}" >
                    {{csrf_field()}}
                    <!-- kalau porsesnya itu dikirim -->
                    @if($dataUser[0]->status == 3)
                    <div class="form-group">
                              <select class="form-control" name="status" disabled>
                                <option value="1">Perbarui Status</option>
                                <option value="2">Diproses</option>
                                <option value="3">Dikirim</option>
                              </select><hr>
                      </div>
                          
                      <hr>
                      <!-- kalau statusnya tidak dikirm -->
                      @elseif ($dataUser[0]->status !== 3)
                      <div class="form-group">
                              <select class="form-control" name="status">
                                <option value="1">Perbarui Status</option>
                                <option value="2">Diproses</option>
                                <option value="3">Dikirim</option>
                              </select><hr>
                      </div>
                          
                      <hr>
                      <button class="btn btn-primary" type="submit">Save</button>
                      @endif
                    </form>

                 <p>&nbsp;</p>
                 
               </div>

             </div>
           </div>
@endsection