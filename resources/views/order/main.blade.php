@extends('layouts.main')
@section('container')
<div class="container-fluid">
    <div id="read"></div>
</div>




  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div id="page"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button onClick="store()" type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>


{{-- End Modal --}}

<script>
    $(document).ready(function() {
    
    read();
    });
    //Read Database
    function read() {
        $.get("{{ url('/order/read') }}", {}, function(data, status) {
                    $("#read").html(data);
                });
    }

    function store() {
        
        var customer_id = $("#customer_id").val();
        var nama_barang = $("#nama_barang").val();
        var quantity = $("#quantity").val();
        var harga = $("#harga").val();
        var tanggal = $("#tanggal").val();
        var keterangan = $("#keterangan").val();
        $.ajax({
            type: "get",
            url: "{{ url('/order/store') }}",
            data: "customer_id=" + customer_id + "&nama_barang=" + nama_barang + "&quantity=" + quantity+ "&harga=" + harga+ "&tanggal=" + tanggal + "&keterangan=" + keterangan,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
    function create() {
        $.get("{{ url('/order/create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Data Order Baru')
            $("#page").html(data);
            $("#exampleModal").modal('show');

        });
    }

    function destroy(id) {

$.ajax({
    type: "get",
    url: "{{ url('/order/destroy') }}/" + id,
    success: function(data) {
        $(".btn-close").click();
        read()
    }
});
}

function edit(id) {
        $.get("{{ url('/order/edit') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Order')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
  
    // untuk proses update data
    function update(id) {
        
        //var customer_id = $("#customer_id").val();
        var nama_barang = $("#nama_barang").val();
        var quantity = $("#quantity").val();
        var harga = $("#harga").val();
        var tanggal = $("#tanggal").val();
        var keterangan = $("#keterangan").val();
      
        $.ajax({
            type: "get",
            url: "{{ url('/order/update') }}/" + id,
            //data: "customer_id=" + customer_id + "&nama_barang=" + nama_barang + "&quantity=" + quantity+ "&harga=" + harga+ "&tanggal=" + tanggal + "&keterangan=" + keterangan,
            data: "nama_barang=" + nama_barang + "&quantity=" + quantity+ "&harga=" + harga+ "&tanggal=" + tanggal + "&keterangan=" + keterangan,
             success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }  

    function show(id) {
        $.get("{{ url('/order/show') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Show Order')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
        
    }

    function done(id) {
        
        //var customer_id = $("#customer_id").val();
        var done = 'Done';
       
      
        $.ajax({
            type: "get",
            url: "{{ url('/order/done') }}/" + id,
            //data: "customer_id=" + customer_id + "&nama_barang=" + nama_barang + "&quantity=" + quantity+ "&harga=" + harga+ "&tanggal=" + tanggal + "&keterangan=" + keterangan,
            data: "done=" + done,
             success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }  

    



</script>
@endsection