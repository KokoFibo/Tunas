
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              Nota Pond
            </div>
            <div class="card-body">
                <form id="itemform">
                    {{-- @csrf  --}}
                    <div class="mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang"  name="nama_barang" required>
                    </div>
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Quantity" aria-label="First name" id="quantity" name="quantity" required>
                        </div>
                        <div class="col">
                            <select class="form-select" aria-label="Default select example" id="harga" name="harga" required>
                                <option selected>Open this select menu</option>
                                @foreach($hargapond as $h)
                                <option value="{{ $h->harga_pond }}">{{ $h->harga_pond }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        
                    <input type="hidden" class="form-control" id="notapond_id"  value="{{ $notapond->no_pond }}" name="notapond_id">
        
                     <button class="btn btn-primary mt-2" onClick="store()">Add</button>
                 </form> 
          </div>
    </div>
</div>