@extends('layouts.main')
@section('container')

<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Gajian pegawai {{ week() }}</h3>
        </div>
        <div class="card-body "> 
            {{-- input --}}
            <div class="row g-3">
                <div class="col-md-4">
                  <label for="karyawan_id" class="form-label">No Id</label>
                  <input type="text" class="form-control" id="karyawan_id" name="karyawan_id">
                </div>
                <div class="col-md-4">
                  <label for="jumlah_hari_kerja" class="form-label">Jumlah hari kerja</label>
                  <input type="text" class="form-control" id="jumlah_hari_kerja" name="jumlah_hari_kerja">
                </div>
                <div class="col-md-4">
                  <label for="jumlah_jam_lembur" class="form-label">Jumlah jam lembur</label>
                  <input type="text" class="form-control" id="jumlah_jam_lembur" name="jumlah_jam_lembur">
                </div>
                <input type="hidden" name="tanggal" id="tanggal" value="{{ date(now()) }}">
                
                
                    <button class="btn btn-primary " onClick="store()">Add</button>
                {{-- </div> --}}
            </div>
            {{-- end Input --}}
            <div id="read"></div>
        </div>
    </div>
</div> 
{{-- modal --}}

  
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
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>



{{-- end modal --}}
<script>
    $(document).ready(function() {
    read();
    });

    function read() {
    $.get("{{ url('/gajian/read') }}", {}, function(data, status) {
        
                $("#read").html(data);
            });
  }
  
    function store() {
        var karyawan_id = $("#karyawan_id").val();
        var jumlah_hari_kerja = $("#jumlah_hari_kerja").val();
        var jumlah_jam_lembur = $("#jumlah_jam_lembur").val();
        var tanggal = $("#tanggal").val();
        $.ajax({
            type: "get",
            url: "{{ url('/gajian/store') }}",
            data: "karyawan_id=" + karyawan_id + "&jumlah_hari_kerja=" + jumlah_hari_kerja + "&jumlah_jam_lembur=" + jumlah_jam_lembur +"&tanggal=" + tanggal,
            success: function(data) {
                read()
                resetForm()
            },
            error: function(){
              alert('error!');
            }
        });
    }

    function resetForm() {
        $('[type=text]').val('');
        $('[name=karyawan_id]').focus();
    }

    function destroy(id) {

        $.ajax({
            type: "get",
            url: "{{ url('gajian/destroy') }}/" + id,
            success: function(data) {
                read()
            }
        });
    }

    function show(id) {
        $.get("{{ url('/gajian/show') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit data gajian')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
 
    function update(id) {
        
        //var karyawan_id = $("#karyawan_id").val();
        let jumlah_hari_kerja = $("#jumlah_hari_kerja1").val();
        let jumlah_jam_lembur = $("#jumlah_jam_lembur1").val();
        // let tanggal = $("#tanggal1").val();
        
        
        $.ajax({
            type: "get",
            url: "{{ url('/gajian/update') }}/" + id,
            data: "jumlah_hari_kerja=" + jumlah_hari_kerja + "&jumlah_jam_lembur=" + jumlah_jam_lembur,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
</script> 

@endsection