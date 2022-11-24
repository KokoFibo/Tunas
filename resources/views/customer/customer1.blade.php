@extends('layouts.main')
@section('container')

<div class="container">


  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Address</th>
        <th>City</th>
        <th>Phone</th>
        <th>Mobile</th>
        <th>Email</th>
        <th><a href="/customer/create"><button type="button" class="btn btn_primary">Create/Add</button></a></th>

      </tr>
    </thead>
    <tbody>
      @foreach ($customer as $c)
          
      <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->title }}</td>
        <td>{{ $c->address }}</td>
        <td>{{ $c->city }}</td>
        <td>{{ $c->phone }}</td>
        <td>{{ $c->mobile }}</td>
        <td>{{ $c->email }}</td>
        <td>
          <div class="btn-group btn-group-sm " role="group" aria-label="Small button group">
            
            <a href="/customer/{{ $c->id }}/edit"><button class="btn btn-warning badge ">Edit</button></a>
            <form action="/customer/{{ $c->id  }}" method="post">
              @method('delete')
              @csrf
              <a href="#" onclick="return confirm('Yakin?')"><button type="submit" class="btn btn-danger badge">Delete</button></a>
            </div>

            </form>
            
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>



    
@endsection
