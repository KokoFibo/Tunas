
@extends('layouts.main')
@section('container')
<div class="container mt-3 d-flex justify-content-center ">
<div class="col-md-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
          Surat Jalan
        </div>
        <div class="card-body mt-3">
            <form action="/suratjalan/store" method="post">
              @csrf
                <label for="exampleFormControlInput1" class="form-label">Nama Customer:</label>
                <select class="form-select" aria-label="Default select example" name="customer_id">
                    <option selected>Open this select menu</option>
                    @foreach($order as $o)
                    <option value="{{ $o->customer->id }}">{{ $o->customer->name }}</option>
                    @endforeach
                  </select>
                  
                  <input type="hidden" class="form-control" name="no_sj" value="{{ $nomorSj }}">
                  <input type="hidden" class="form-control" name="tanggal" value="{{ date(now()) }}">


                <button type="submit" name="submit" class="btn btn-primary mt-3" >Create Nota</button>
                  
            </form>
        </div>
   
      </div>
    </div>

  </div>
  <div class="container mt-3 d-flex justify-content-center" id="content">
    
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-hovered ">
        <thead class="bg-primary text-white">
            <tr>
                <th>No Surat Jalan</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
      
        </tbody>
            @foreach ($suratjalan as $n)
                <tr>
                    <td>{{ 'TJB-' . $n->no_sj }}</td>
                    <td>{{ $n->customer->name }}</td>
                    <td>{{ $n->tanggal }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="/suratjalan/show/{{ $n->id }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Show</button>
                            </form>
                            <form action="/suratjalan/edit/{{ $n->id }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-warning btn-sm">Update</button>
                            </form>
                            
                            <form action="/suratjalan/delete/{{ $n->id }}">
                                @csrf
                            <a href="#" onclick="return confirm('Yakin?')"><button class="btn btn-danger btn-sm">Delete</button></a> 
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        <tbody>
    </table>
  </div>
</div>
    
  </div>
  

    
@endsection