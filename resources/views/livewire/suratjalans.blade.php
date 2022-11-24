<div>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Surat Jalan
                        <a href="/"><button class="btn btn-primary float-end">X</button></a>
                    </h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <select class="form-select mb-3" wire:model="customerId" id="customerId" name="customerId" @if($btn==0) hidden @endif>
                            <option selected>Pilih customer</option>
                            @foreach ($order as $o)
                            <option value="{{ $o->customer_id }}">{{ $o->customer->name}}</option>
                            @endforeach
                        </select>
 
                        <select class="form-select mb-3" id="order_id" name="order_id" wire:model="order_id" @if($btn==0) hidden @endif>
                            <option selected>Pilih Order</option>
                            @foreach ($order2 as $ord)
                            <option value="{{ $ord->id }}">{{ $ord->nama_barang }}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" wire:model="quantity" @if($btn==0) hidden @endif >
                        </div>
                        <input type="hidden" class="form-control" id="tanggal"  name="tanggal" wire:model="tanggal" >
                        <input type="hidden" class="form-control" id="nosj"  name="nosj" wire:model="nosj" >
                        <button  class="btn btn-primary" wire:click.prevent="store" @if($btn==0) hidden @endif >Save</button>
                    </form>

                    <table class="table table-bordered table-hover" @if($hide==0) hidden @endif>
                        <thead>
                            <tr>
                                <th>No Surat Jalan</th>
                                <th>Nama Customer</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratjalan as $sj)
                                <tr>
                                    <td>TJB-{{ $sj->no_sj }}</td>
                                    <td>{{ Str::headline($sj->order->customer->name) }}</td>
                                    <td>{{ Str::headline($sj->order->nama_barang) }}</td>
                                    <td>{{ $sj->order->harga }}</td>
                                    <td>{{ $sj->quantity }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="delete({{ $sj->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>