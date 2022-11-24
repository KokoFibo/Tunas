<div class="mb-3">
    <label for="customer_id" class="form-label">Nama</label>
    <input type="text" class="form-control" id="customer_id" placeholder="customer_id" name="customer_id" value="{{ Str::headline($order->customer->name) }}">
</div>

<div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama_barang" placeholder="Nama barang" name="nama_barang" value="{{ Str::headline($order->nama_barang) }}">          
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="{{ number_format($order->quantity) }}">
</div>

<div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga" value="{{ number_format($order->harga) }}">
</div>

<div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="text" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="{{ $order->tanggal }}">
</div>

{{-- <input type="hidden" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="{{ date(now()) }}"> --}}

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" value="{{ Str::headline($order->keterangan) }}">
</div>


    
