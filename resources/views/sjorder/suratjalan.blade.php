@extends('layouts.main')
@section('container')
<div class="container">
    <form action="/suratjalanorder/save" method="post">
        @csrf
        <div class="row">
            <h3>Surat jalan Tunas Jaya</h3>
            {{-- <h4>Nama customer : {{ $customer->title->name_title }}. {{ $customer->name }}</h4> --}}
            <h4>No : TJB-{{ $nomorSj }}</h4>
            <h4>Tanggal : {{ hariIni() }}</h4>
            <div class="col-md-3">
                <select class="form-select my-3"  id="customer_id" name=customer_id >
                    <option selected>Pilih customer</option>
                    @foreach($order as $c)
                        <option value="{{ $c->customer->id }}">{{ $c->customer->name  }}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-bordered">
                
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-select" name="order_id" id="nama_barang">
                                <option selected>Open this select menu</option>
                                @foreach($order as $o)
                                <option value="{{ $o->id }}">{{ $o->nama_barang }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="form-control" type="text" name="quantity"></td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="tanggal" value="{{ date(now()) }}">
            <input type="hidden" name="no_sj" value="{{ $nomorSj }}">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<script>
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#customer_id').on('change', function(){
                let customer_id = $('#customer_id').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getnamabarang') }}",
                    data: { customer_id:customer_id },
                    cache: false,

                    success: function(msg){
                        $('#nama_barang').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    }

                })
            })
        })


    });

</script>


@endsection