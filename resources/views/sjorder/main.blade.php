@extends('layouts.main')
@section('container')
<div class="container">
    <div class="row">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Surat Jalan
                    <a href="/suratjalanorder/create"><button class="btn btn-primary float-end" >Create Surat Jalan</button></a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-5">
                    <input type="search" name="search" id="search" placeholder="Search..." class="form-control" >
                </div>
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th>Nama Customer</th>
                            <th>Nama Barang</th>
                            <th>No SJ</th>
                            <th>Quantity</th>
                            <th>Harga(Rp.)</th>
                            <th>Tanggal</th>
                             
                        </tr>
                    </thead>
                    <tbody id="content">
                        @foreach($suratjalan as $sj)
                        <tr>
                            <td>{{ Str::headline($sj->order->customer->name) }}</td>
                            <td>{{ Str::headline($sj->order->nama_barang) }}</td>
                            <td>TJB-{{ $sj->no_sj }}</td>
                            <td>{{ number_format($sj->quantity) }}</td>
                            <td>{{ number_format($sj->order->harga) }}</td>
                            <td>{{ $sj->tanggal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $suratjalan->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    $('#search').on('keyup', function(){
        $value=$(this).val();

        $.ajax({
            type:'get',
            url:"{{ route('search') }}",
            data:{'search': $value},

            success:function(data){
                console.log(data);
                $('#content').html(data);
            }

        });
    })
</script>


@endsection