<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
</div>
<div class="mb-3">
    <label for="harian" class="form-label">Gaji Harian</label>
    <input type="text" class="form-control" id="harian" placeholder="Gaji Harian" name="harian">
</div>
<div class="mb-3">
    <label for="lembur" class="form-label">Gaji Lembur</label>
    <input type="text" class="form-control" id="lembur" placeholder="Gaji Lembur" name="lembur">
</div>
<div class="mb-3">
    <label for="bulanan" class="form-label">Gaji Bulanan</label>
    <input type="text" class="form-control" id="bulanan" placeholder="Gaji Bulanan" name="bulanan">
</div>

  {{-- <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status" value="Aktif" >
    <label class="form-check-label" for="status">
      Aktif
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status" value="Non-Aktif" >
    <label class="form-check-label" for="status">
      Non-Aktif
    </label>
  </div> --}}
  <div class="form-group mt-2">
    <button class="btn btn-success" onClick="store()">Create</button>
</div>