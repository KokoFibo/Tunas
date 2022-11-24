@extends('layouts.main')
@section('container')
<div class="container ">
<div class="card mt-2 mb-4 mx-auto  " style="width: 80%;">
    <div class="card-header">
      <h3>Edit Data</h3>
    </div>
    <form action="/pesanan/{{ $pesanan->id }}" method="post">
        @method("put")
        @csrf
    <div class="card-body">
    </div>
    <label class="form-check-label " for="flexRadioDefault2">
      Title
    </label>
    <input type="hidden" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ $pesanan->nama }}">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" placeholder="nama" value="{{ $pesanan->nama }}"required>
    </div>
    

    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" rows="3" value="{{ $pesanan->nama_barang }}" required>
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ $pesanan->quantity }}" required>
    </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" value="{{ $pesanan->harga }}" required>
    </div>
      
    <button class="btn btn-primary" type="submit" name="submit">Update</button>
    
      
    
</form>
  </div>
</div>


    
@endsection