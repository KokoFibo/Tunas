@extends('layouts.main')mt
@section('container')
<div class="container ">
<div class="card mt-2 mb-4 mx-auto " style="width: 80%;">
    <div class="card-header">
      <h3>Create/Add Data</h3>
    </div>
    <form action="store" method="post">
        @csrf
    <div class="card-body">
    </div>
    <label class="form-check-label " for="flexRadioDefault2">
      Title
    </label>
    
    
   
    
    <select class="form-select" aria-label="Default select example" name="nama">
      <option selected>Open this select menu</option>
      @foreach($customer as $c)
      <option value="{{ $c->name }}">{{ $c->name }}</option>
      
      @endforeach
    </select>




    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="kota" name="nama_barang" placeholder="Nama Barang" required>
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
    </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
    </div>
      
    <button class="btn btn-primary kirim" type="submit" id="button" name="submit">Save</button>
</form>
</div>
</div>
@if ($errors->any())
  <div class="4-4/8 m-auto text-center ">
    @foreach($errors->all() as $item)
    <li class="text-red-500 list-none">
      {{ $item }}

    </li>

    @endforeach
  </div>
@endif


    
@endsection