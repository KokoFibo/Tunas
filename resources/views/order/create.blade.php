<div class="mb-3">
    <label for="customer_id" class="form-label">Nama</label>
    <select class="form-select" aria-label="Default select example" id="customer_id" name="customer_id">
        <option selected>Open this select menu</option>
        @foreach ($customer as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama_barang" placeholder="Nama barang" name="nama_barang">          
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
</div>

<div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga">
</div>


<input type="hidden" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="{{ date(now()) }}">

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan">
</div>
<button onClick="store()" type="button" class="btn btn-primary">Save</button>
    
