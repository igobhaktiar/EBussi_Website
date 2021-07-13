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
    <title>Cetak Data Pengguna</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pengguna</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        
                        <tbody>
                            <tr>
                            <th>No</th>
                            <!-- <th>Foto</th> -->
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Waktu Daftar</th>
                            </tr>

                        <?php
                        $no = 1;
                        ?>
                         @foreach ($data_user_cetak as $user)
                        <tr class=>
                            <td>{{$no++}}</td>  
                            <!-- <td>
                            dikasih kondisi, apabila foto ada dan tidak ada
                            <img src="{{ url('upload_foto_user') }}/{{ $user->foto_user}}" width="40" ></td> -->
                            
                            <td>{{$user->name}}</td>  
                            <td>{{$user->username}}</td>  
                            <td>{{$user->email}}</td>  
                            <td>{{$user->created_at}}</td>
                           
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