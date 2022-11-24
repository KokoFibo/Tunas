<table class="table">
    <thead>
        <tr>
            {{-- <th>Nota Pond</th> --}}
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $n)
        <tr>
            {{-- <td>{{ $n->notapond->id }}</td> --}}
            <td>{{ $n->nama_barang }}</td>
            <td>{{ number_format($n->quantity) }}</td>
            <td>{{ number_format($n->harga) }}</td>
             <td>
                    <a href="#"><button type="submit" onClick="destroy({{ $n->id }})" class="btn btn-danger badge">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>