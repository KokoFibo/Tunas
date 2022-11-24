@extends('layouts.main')
@section('container')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Gajian pegawai {{ date(now()) }}</h3>
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
                
                
                    {{-- <button class="btn btn-primary " onClick="store()">Add</button> --}}
                {{-- </div> --}}
            </div>
            {{-- end Input --}}
            {{-- read --}}

            <table class="table table-bordered table-hover mt-5">
                <thead>
                    <tr>
                        <th>No. Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Jumlah Hari Kerja</th>
                        <th>Jumlah Jam Lembur</th>
                        <th>Action</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach ($gajian as $g)
                    <tr>
                        <td>{{ $g->karyawan->id }}</td>
                        <td>{{ $g->karyawan->nama }}</td> 
                        <td>{{ $g->jumlah_hari_kerja }}</td>
                        <td>{{ $g->jumlah_jam_lembur }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-warning btn-sm" onClick="show({{ $g->id }})">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" onClick="destroy({{ $g->id }})">Delete</button>
                              </div>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            
            </table>

           
            
            

        </div>
    </div>
</div> 

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
        let jumlah_hari_kerja = $("#jumlah_hari_kerja").val();
        let jumlah_jam_lembur = $("#jumlah_jam_lembur").val();
       
        alert(jumlah_hari_kerja);
       // var tanggal = $("#tanggal").val();
        $.ajax({
            type: "get",
            url: "{{ url('/gajian/update') }}/" + id,
            //data: "karyawan_id=" + karyawan_id + "&jumlah_hari_kerja=" + jumlah_hari_kerja + "&jumlah_jam_lembur=" + jumlah_jam_lembur +"&tanggal=" + tanggal,
            data: "jumlah_hari_kerja=" + jumlah_hari_kerja + "&jumlah_jam_lembur=" + jumlah_jam_lembur,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }

 

</script> 

@endsection