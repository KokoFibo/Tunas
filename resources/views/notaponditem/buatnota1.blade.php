
@extends('layouts.main')
@section('container')
<div class="container">
    
   <h5>Nama Customer : {{   $notapond->customer->title->name_title . '.  '. $notapond->customer->name }}  </h5>
   <h5>No Nota : {{ 'PND-' . $notapond->no_pond }}</h5>
   <h5>Tanggal : {{ $notapond->tanggal }}</h5>
   <button class="btn btn-primary" onClick="/notaponditem/create()">+ Tambah Product</button>

   <div id="content"></div>
   <div id="read"></div>

      <a href="/notapond/main">Back</a>
      {{-- <a href="/"><button class="btn btn-primary" type="submit">Save</button></a>  --}}

</div>
<script>
$(document).ready(function() {
            loadData();
        })
        // loadData
function loadData() {
    $.get("{{ url('/notaponditem/read') }}", {}, function(data, status) {
        $("#read").html(data);
    });
}
 
function create() {
    $.get("{{ url('/notaponditem/create') }}", {}, function(data, status) {
                
                $("#page").html(data);
    });
                

}

// untuk proses create data
function store() {
            var nama_barang = $("#nama_barang").val();
            var quantity = $("#quantity").val();
            var harga = $("#harga").val();
            var notapond_id = $("#notapond_id").val();
            
           
            $.ajax({
                type: "get",
                url: "{{ url('/notaponditem/store') }}",
                // data: "nama_barang=" + nama_barang,
                // "quantity=" + quantity,
                // "harga=" + harga,
                // "notapond_id=" + notapond_id

                data: $(#itemform).serialize(),

                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }


</script>


@endsection