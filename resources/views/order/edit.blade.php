<div class="mb-3">
    <label for="customer_id" class="form-label">Nama</label>
    <input type="text" class="form-control" id="customer_id"  name="customer_id" value="{{ $order->customer->name }}" disabled>    
</div>

<div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama_barang"  name="nama_barang" value="{{ $order->nama_barang }}">          
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity"  name="quantity" value="{{ $order->quantity }}">
</div>

<div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga"  name="harga" value="{{ $order->harga }}">
</div>

<div class="mb-3">
    <label for="tanggal" class="form-label">tanggal</label>
    <input type="date" class="form-control" id="tanggal"  name="tanggal" value="{{ $order->tanggal }}">
</div>

{{-- <input type="hidden" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="{{ date(now()) }}"> --}}

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" value="{{ $order->keterangan }}">
</div>

<button onClick="update({{ $order->id }})" class="btn btn-primary">Save</button>
    
