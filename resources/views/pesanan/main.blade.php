@extends('layouts.main')
@section('container')
<div class="container">
<div class="card">
  <div class="card-header">
    <h2>Pesanan</h2>
    </div>
    <div class="card-body">

      {{-- <div class="container "> --}}
        <table class="table mt-5" id="example" >
          <thead>
            <tr>
              <th>Nama Customer</th>
              <th>Nama Barang</th>
              <th>Quantity</th>
              <th>Harga</th>
             
              <th><a href="/pesanan/create"><button type="button" class="btn btn-primary">Create/Add</button></a></th>
      
            </tr>
          </thead>
          <tbody>
            @foreach ($pesanan as $p)
            
            <tr>
              <td>{{ Str::headline($p->nama) }}</td>
              <td>{{ $p->nama_barang }}</td>
              <td>{{ $p->quantity }}</td>
              <td>{{ $p->harga }}</td>
             
              <td>
                <div class="btn-group btn-group-sm " role="group" aria-label="Small button group">
                  
                  <a href="/pesanan/{{ $p->id }}/edit"><button class="btn btn-warning badge ">Edit</button></a>
                  <form action="/pesanan/{{ $p->id  }}" method="post">
                    @method('delete')
                    @csrf
                    <a href="#" onclick="return confirm('Yakin?')"><button type="submit" class="btn btn-danger badge">Delete</button></a>
                  </div>
      
                  </form>
                  
              </td>
      
            </tr>
            @endforeach
          </tbody>
        </table>
      {{-- </div> --}}
    </div>
</div>
</div>


<script>
  $(document).ready(function () {
$('#example').DataTable();
});
</script>
    
@endsection
