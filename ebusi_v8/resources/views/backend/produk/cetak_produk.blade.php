<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="scrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Produk</title>
</head>
<body>
<div class="form-group">
        <p align="center"><b>Laporan Data Produk</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                    <tbody>
                            <tr align="center">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Berat Isi Produk</th>
                            <th>Harga Produk</th>
                            <th>Foto Produk</th>
                          
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                        
                        @foreach ($data_cetak as $produk => $item)
                        <tr align="center">
                            <td>{{$no++}}</td>
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
                          
                            </tr>   
                          @endforeach

                        </tbody>
                    </table>
                  </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>