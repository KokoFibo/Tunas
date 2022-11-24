<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Create Nota
                    <a href="/"><button class="btn btn-info float-end" >X</button></a>
                    <button class="btn btn-primary float-end" wire:click="create" >Create Nota</button>
                </h3>
            </div>
            <div class="card-body">
                <select class="form-select" wire:model="orderid">
                    <option selected>Open this select menu</option>
                    @foreach($order as $o)
                        <option value="{{ $o->id}}">{{ $o->customer->name }} -> {{ $o->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
        </div>  
            <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                
                            </th>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>No. Surat Jalan</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suratjalan as $s)
                            @if($s->nota == null)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  wire:model="pilihan" value="{{ $s->id }}" >
                                        </div>
                                    </td>    
                                    <td>{{ $s->id }}</td>
                                    <td>{{ Str::headline($s->order->customer->name) }}</td>
                                    <td>TJB-{{ $s->no_sj }}</td>
                                    <td>{{ Str::headline($s->order->nama_barang) }}</td>
                                    <td>{{ number_format($s->quantity) }}</td>
                                    <td>{{ number_format($s->order->harga) }}</td>
                                    <td>{{ $s->tanggal }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
       
     </div>
     
    </div>
   
  
