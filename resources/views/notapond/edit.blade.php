@extends('layouts.main')
@section('container')


<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOTAPOND ID</th>
                <th>NAMA BARANG</th>
                <th>QUANTITY</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notaponditem as $n) 
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->notapond_id }}</td>
                <td>{{ $n->nama_barang }}</td>
                <td>{{ $n->quantity }}</td>
                <td>{{ $n->harga }}</td>
                <td>
                    <div class="btn-group">
                        <form action="/notapond/edititem/{{ $n->id }}">
                            @csrf
                            <button class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <form action="/notapond/destroy/{{ $n->id }}">
                            @csrf
                            <a href="#" onclick="return confirm('Yakin?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/notapond/main"><button class="btn btn-primary">Done</button></a>
</div>
@endsection