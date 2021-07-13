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
    <title>Cetak Data Pembelian</title>
</head>
<body>
<div class="form-group">
        <p align="center"><b>Laporan Data Pembelian</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tbody>
                            <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status Pembelian</th>
                            <th>Total</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                        @foreach ($data as $pembelian => $item)
                       
                        
                        <tr align="center">
                            <td>{{$no++}}</td>
                            
                            <td>{{$item->name}}</td>
                           
                            <td>{{$item->tanggal_pesanan}}</td>
                            <td>
                            @if($item->status == 1)
                            Menunggu Konfirmasi
                            @elseif ($item->status == 2)
                            Pesanan Diproses
                            @elseif ($item->status == 3)
                            Pesanan Dikirim
                            @endif
                            </td>
                            <td>Rp. {{ number_format($item->jumlah_harga)}}</td>
                           
                        </tr>   
                        
                        @endforeach                      
                        </tbody>
        </table>
        <script type="text/javascript">
        window.print();
    </script>
</body>
</html>