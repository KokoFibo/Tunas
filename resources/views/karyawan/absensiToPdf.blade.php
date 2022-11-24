<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tunas Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <style>
        th,h2 {
            text-align: center;
        }
    </style>
    
    <h2>Absensi Mingguan Periode Tgl {{ week() }}</h2>
    <table cellpadding="5px" class="table table-bordered">
        <thead>
            <th rowspan=2 >No</th>
            <th rowspan=2>Nama</th>
            <th rowspan=2>NIK</th>
            <th colspan=2>Senin</th>
            <th colspan=2>Selasa</th>
            <th colspan=2>Rabu</th>
            <th colspan=2>Kamis</th>
            <th colspan=2>Jumat</th>
            <th colspan=2>Sabtu</th>
            <th colspan=2 >Minggu</th>
            <th colspan=2>Total</th>
            
        <tr>
            
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JHK</th>
            <th>JJL</th>
            <th>JJL</th>
            <th>Total JHK</th>
            <th>Total JJL</th>
    
        </tr>
        </thead>
        <tbody>
            <?php $i=0 ?>
            @foreach ($karyawan as $k)
            <?php $i++ ?>
            <tr>
                <td>{{ $i }}</td>
                <td class="nama">{{ Str::headline($k->nama) }}</td>
                <td>{{ $k->id }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="total"></td>
                <td class="total"></td>
                
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>