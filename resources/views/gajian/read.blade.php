
<table class="table table-bordered table-hover mt-5">
    <thead>
        <tr>
            <th>NIK</th>
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
            <td>{{  Str::headline($g->karyawan->nama) }}</td> 
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