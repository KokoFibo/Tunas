@foreach ($data as $c)
    <tr>
        <td>{{ Str::headline($c->name) }}</td>
        <td>{{ $c->name_title }} </td>
        <td>{{ Str::headline($c->address) }}</td>
        <td>{{ Str::headline($c->city) }}</td>
        <td>{{ $c->phone }}</td>
        <td>{{ $c->mobile }}</td>
        <td>{{ $c->email }}</td>
        <td>
            <div class="btn-group btn-group-sm " role="group" aria-label="Small button group">
                <button onClick="show({{ $c->id }})" class="btn btn-success badge "><i
                        class="fa fa-eye"></i></button>
                <button class="btn btn-warning badge " onClick="edit({{ $c->id }})">
                    <i class="fa fa-pen"></i></button>
                <button onClick="destroy({{ $c->id }})" class="btn btn-danger badge"><i
                        class="fa fa-trash-alt"></i></button></button></a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="12" align="center">
        {{ $data->onEachSide(1)->links() }}

    </td>
</tr>
