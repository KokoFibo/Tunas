<table class="table">
    <thead>
        <tr>
            {{-- <th>Nota Pond</th> --}}
            <th>Order_ID</th>
            <th>Quantity</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $n)
        <tr>
            
            {{-- <td>{{ $n->suratjalan->order->nama_barang }}</td> --}}
            <td>{{ $n->order_id }}</td>
            <td>{{ number_format($n->quantity) }}</td>
           
             <td>
                    <a href="#"><button type="submit" onClick="destroy({{ $n->id }})" class="btn btn-danger badge">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>