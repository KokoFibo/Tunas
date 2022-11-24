@extends('layouts.main')
@section('container')

<style>
    th,h2 {
        text-align: center;
    }
    .btnBack {
        margin-right: 5px;  
    }
    
</style>
<div class="container">


<h2>Absensi Mingguan Periode Tgl {{ week() }}
    <div class="btn-group float-end" role="group" aria-label="Basic example">
        <a href="/"><button class="btn btn-success btnBack" ">Back</button></a>
        <a href="/karyawan/download-pdf"><button class="btn btn-primary">Print PDF</button></a> 
      </div>
</h2>
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
</div>
@endsection