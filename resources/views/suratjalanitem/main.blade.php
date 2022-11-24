
@extends('layouts.main')
@section('container')
<div class="container">
    
   <h5>Nama Customer : {{   $suratjalan->customer->title->name_title . '.  '. $suratjalan->customer->name }}  </h5> 
   <h5>No Surat Jalan : {{ 'TJB-' . $suratjalan->no_sj }}</h5>
   <h5>Tanggal : {{ $suratjalan->tanggal }}</h5>
<hr>
<div class="row">
    <div class="col">
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach($order as $o)
            <option value="{{ $o->id }}" name="order_id" id="order_id">{{ $o->nama_barang }}</option>
            @endforeach
          </select>
    </div> 
    <div class="col">
      <input type="text" class="form-control" placeholder="Quantity" name="quantity" id="quantity">
    </div>
    <input type="hidden" class="form-control"  name="suratjalan_id" id="suratjalan_id" value="{{ $nomoridSj }}">
 
  </div>
</div>
<button class="btn btn-primary" onClick="store()">+ Tambah Product</button>
<div id="read"></div>
<script>

$(document).ready(function() {
    
    read();
  });

  

  function read() {
    $.get("{{ url('/suratjalanitem/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
  }

function store() {
            var suratjalan_id = $("#suratjalan_id").val();
            var order_id = $("#order_id").val();
            var quantity = $("#quantity").val();
            

            $.ajax({
                type: "get",
                url: "{{ url('/suratjalanitem/store') }}",
                data: "suratjalan_id=" + suratjalan_id + "&order_id=" + order_id + "&quantity=" + quantity,
                success: function(data) {
                  read()
                  resetForm()
                }
            });
        }

        function resetForm() {
      $('[type=text]').val('');
     
      

    }
</script>


@endsection