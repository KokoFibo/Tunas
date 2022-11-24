@extends('layouts.main')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Nota Pond: {{ $customerName }}
                <a href="/notapond/main"><button class="btn btn-primary float-end">Back</button></a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Pond</th>
                        <th>Nama barang</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                <tbody> 
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>TJB-{{ $d->no_pond }}</td>
                            <td>{{ Str::headline($d->nama_barang) }}</td>
                            <td>{{ number_format($d->quantity) }}</td>
                            <td>{{ number_format($d->harga) }}</td>
                            <td>{{ $d->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
