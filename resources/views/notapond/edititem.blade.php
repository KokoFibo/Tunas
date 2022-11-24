
@extends('layouts.main')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update Nota Item</h3>
                </div>
                <form action="/notapond/itemupdate/{{ $notaponditem->id }}" method="post">
                    @csrf
                    <input type="hidden" name="notapond_id" value="{{ $notaponditem->notapond_id }} ">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $notaponditem->nama_barang }}">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $notaponditem->quantity }}">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="harga">
                                <option selected>{{ $notaponditem->harga }}</option>
                                @foreach ($harga as $h)
                                <option value="{{ $h->harga_pond }}">{{ $h->label_harga }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success ms-3 mb-3">Update</button>
                    <a href="/notapond/edit/{{ $notaponditem->notapond_id }}" class="float-end me-3 mb-3"><button class="btn btn-warning">Back</button></a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection