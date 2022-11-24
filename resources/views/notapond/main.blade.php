
@extends('layouts.main')
@section('container')
<div class="container mt-3 d-flex justify-content-center ">
{{-- <div class="col-md-3"> --}}
    <div class="card">
        <div class="card-header">
          <h4>Nota Pond
            <a href="/notapond/create"><button class="btn btn-primary mt-3 float-end" >Create Nota</button></a>
          </h4>
        </div>
        
        <div class="card-body ">
          <input type="search" class="form-group" name="search" id="search" placeholder="Search...">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-hovered ">
                <thead >
                  <tr>
                    <th>No Pond</th>
                    <th>Customer Name</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
              <tbody class="allData">
              @foreach ($notapond as $n)
              <tr>
                @php 
                  $total=0;
                  $notaponditem = DB::table('notaponditem')->where('notapond_id', $n->id)->get();
                  foreach ($notaponditem as $t ) {
                    $total = $total + $t->quantity * $t->harga;
                  }
                @endphp
                 
                <td>{{ 'PND-' . $n->no_pond }}</td>
                <td>{{ $n->customer->name }}</td>
                <td>{{ $n->tanggal }}</td>
                <td>{{ number_format($total) }}</td>
                <td>
                  <div class="btn-group">
                    <a href="/notapond/show/  {{ $n->id }}   "><button type="submit" name="submit" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                      <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547zM14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                    </svg></button></a>
                    <a href="/notapond/edit/  {{ $n->id }}    "><button type="submit" name="submit" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></button></a>
                    <a href="/notapond/delete/  {{ $n->id }}    " onclick="return confirm("Yakin?")"><button class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg></button></a> 
                </div>
                </td>
              </tr>
              @endforeach
            </tbody>
                <tbody id="content" class="searchData"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
  <script>
    $('#search').on('keyup', function(){
          $value=$(this).val();
          if($value){
            $('.allData').hide();
            $('.searchData').show();
          } else {
            $('.allData').show();
            $('.searchData').hide();
          }
          $.ajax({
              type:'get',
              url:"{{ route('searchNotaPond') }}",
              data:{'search': $value},
  
              success:function(data){
                  console.log(data);
                  $('#content').html(data);
              }
  
          });
      })
    
  
  
  </script>
  
@endsection