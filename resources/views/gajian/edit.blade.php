{{-- input --}}
<div class="row g-3">
    
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $gajian->karyawan->nama }} " disabled >
    </div>
    <div class="mb-3">
      <label for="karyawan_id" class="form-label">No Id</label>
      <input type="text" class="form-control" id="karyawan_id" name="karyawan_id" value="{{ $gajian->karyawan->id }} " disabled>
      
    </div>
    <div class="mb-3">
        <label for="tanggal1" class="form-label">Tanggal</label>
        <input type="date" class="form-control" name="tanggal1" id="tanggal1" value="{{ $gajian->tanggal }}" disabled>
      </div>
    <div class="mb-3">
      <label for="jumlah_hari_kerja" class="form-label">Jumlah hari kerja</label>
      <input type="text" class="form-control" id="jumlah_hari_kerja1" name="jumlah_hari_kerja1" value="{{ $gajian->jumlah_hari_kerja }}">
    </div>
    <div class="mb-3">
      <label for="jumlah_jam_lembur" class="form-label">Jumlah jam lembur</label>
      <input type="text" class="form-control" id="jumlah_jam_lembur1" name="jumlah_jam_lembur1" value="{{ $gajian->jumlah_jam_lembur }}">
    </div>
     
     
    {{-- <div class="col-md-3"> --}}
        <button class="btn btn-primary " onClick="update({{ $gajian->id }})">Save</button>
        {{-- <button class="btn btn-primary " >Save</button> --}}
    {{-- </div> --}}
</div>
{{-- end Input --}} 