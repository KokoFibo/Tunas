<table class="table table-hover" id="item">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=0; ?>
        @forelse ($notaponditem as $n)
        <?php $no++; ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $n->nama_barang}}</td>
            <td>{{ $n->quantity }}</td>
            <td>{{ $n->harga }}</td>
            <td>delete</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>