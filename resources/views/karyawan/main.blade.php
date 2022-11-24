@extends('layouts.main')
@section('container')

<div class="container-fluid" id="read"></div>
    

  
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
      </div>
    </div>
  </div>

{{-- END MODAL --}}


<script>

    $(document).ready(function() {
    
      read();
    });
    //Read Database
    function read() {
      $.get("{{ url('/karyawan/read') }}", {}, function(data, status) {
                  $("#read").html(data);
              });
    }

    // Modal untuk create
    function create() {
        $.get("{{ url('/karyawan/create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Data karyawan baru')
            $("#page").html(data);
            $("#exampleModal").modal('show');

        });
    }

    // untuk proses create data
    function store() {
        
            var nama = $("#nama").val();
            var harian = $("#harian").val();
            var lembur = $("#lembur").val();
            var bulanan = $("#bulanan").val();
            var status = 'Aktif';

            $.ajax({
                type: "get",
                url: "{{ url('/karyawan/store') }}",
                data: "nama=" + nama + "&harian=" + harian + "&lembur=" + lembur+ "&bulanan=" + bulanan+ "&status=" + status,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }

    // untuk delete atau destroy data
    function destroy(id) {

        $.ajax({
            type: "get",
            url: "{{ url('/karyawan/destroy') }}/" + id,
            // data: "name=" + name,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }

    // Untuk modal halaman edit show
    function show(id) {
        $.get("{{ url('/karyawan/show') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit data Karyawan')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
  
    // untuk proses update data
    function update(id) {
        
        var nama = $("#nama").val();
        var harian = $("#harian").val();
        var lembur = $("#lembur").val();
        var bulanan = $("#bulanan").val();
        var status = $("#status:checked").val();
      
        $.ajax({
            type: "get",
            url: "{{ url('/karyawan/update') }}/" + id,
            data: "nama=" + nama + "&harian=" + harian + "&lembur=" + lembur+ "&bulanan=" + bulanan+ "&status=" + status,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }

 




</script>
    
@endsection