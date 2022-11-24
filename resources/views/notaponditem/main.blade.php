
@extends('layouts.main')
@section('container')
<form action="/notaponditem/store" method="post">
  @csrf
  <input type="hidden" name="no_pond" value="{{ $nomornota }}">
  <input type="hidden" name="tanggal" value="{{ date(now()) }}">
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-2 mt-2">
        <h5>Customer</h5>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" name="customer_id">
          <option selected>Open this select menu</option>
          @foreach($customer as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <h5>No Nota </h5>
      </div>
      <div class="col-md-4">
        <h5>{{ 'PND-' . $nomornota }}</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <h5>Tanggal</h5>
      </div>
      <div class="col-md-4">
        <h5>{{ hariIni() }}</h5>
      </div>
    </div>
    <hr>
    </div>
    <div class="container">
        
      
        <div class="row">
          <table class="table table-bordered table">
            @php
              $no=1;
            @endphp
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" id="nama_barang" name="nama_barang[]"  placeholder="Nama barang....." required></td>
                <td><input type="text" class="form-control" id="quantity" name="quantity[]" required></td>
                <td>
                  <select id="harga" class="form-select" name="harga[]" required>
                    <option selected>Pilih harga...</option>
                    @foreach ($hargapond as $h)
                      <option value="{{ $h->harga_pond }}">{{ $h->label_harga }}</option>
                    @endforeach
                </select>
                </td>
                <td><a href="javascript:void(0)" class="btn btn-danger deleteRow">-</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <button class="btn btn-primary" type="submit" name="submit">Save</button>
        </div>
      </div>
</form>

<hr>
   <div id="read" class="container"></div>

    <div class="container">
      <a href="/notapond/main"><button class="btn btn-success">Back</button></a>
    </div>
      
 


<script>

  $(document).ready(function() {
    //read();
  });

  $('thead').on('click', '.addRow', function() {

    const tr = "<tr>"+
                    "<td><input type='text' class='form-control' id='nama_barang' name='nama_barang[]'  placeholder='Nama barang.....' required></td>"+
                    "<td><input type='text' class='form-control' id='quantity' name='quantity[]' required></td>"+
                    "<td>"+
                      "<select id='harga' class='form-select' name='harga[]' required>"+
                        "<option selected>Pilih harga...</option>"+
                        "@foreach ($hargapond as $h)"+
                          "<option value='{{ $h->harga_pond }}'>{{ $h->label_harga }}</option>"+
                        "@endforeach"+
                      "</select>"+
                    "</td>"+
                    "<td><a href='javascript:void(0)' class='btn btn-danger deleteRow'>-</a></td>"+
                "</tr>"
    $('tbody').append(tr);
  });

  $('tbody').on('click', '.deleteRow', function() {
    $(this).parent().parent().remove();    
  });

  

  // function read() {
  //   $.get("{{ url('/notaponditem/read') }}", {}, function(data, status) {
  //               $("#read").html(data);
  //           });
  // }


// untuk proses create data
function stores() {
            var notapond_id = $("#notapond_id").val();
            var nama_barang = $("#nama_barang").val();
            var quantity = $("#quantity").val();
            var harga = $("#harga").val();

            $.ajax({
                type: "get",
                url: "{{ url('/notaponditem/store') }}",
                data: "notapond_id=" + notapond_id + "&nama_barang=" + nama_barang + "&quantity=" + quantity +"&harga=" + harga,
                success: function(data) {
                  read()
                  resetForm()
                }
            });
        }

        function resetForm() {
      $('[type=text]').val('');
      $('[name=nama_barang]').focus();
      

    }


  // untuk delete atau destroy data
  function destroy(id) {

    $.ajax({
    type: "get",
    url: "{{ url('notaponditem/destroy') }}/" + id,
    // data: "name=" + name,
    success: function(data) {
        
        read()
    }
});
}

    
</script>








@endsection