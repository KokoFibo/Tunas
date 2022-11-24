@extends('layouts.main')
@section('container')

<div class="container d-flex  justify-content-evenly  mt-2">
    
            <div class="card">
                <div class="card-header">
                  Add Title
                </div>
                <div class="card-body">
                    <form action="store" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title Name:</label>
                            <input type="text" class="form-control" id="title" placeholder="Bapak, Ibu, PT, CV" name="name_title">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="default">
                            <label class="form-check-label" for="flexCheckDefault">
                            Set to Default
                            </label>
                        </div>
                        
                        <button name="submit" type="submit" class="btn btn-primary mt-2">Save</button>
                 
                    </form>
                </div>
            </div>
         
            <div class="card" >
                <div class="card-header">
                    Set Default to title
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Default</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($title as $t)
                            <tr>
                                <td>{{ $t->name_title }}</td>
                                
                                <td>{{ $t->default }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm " role="group" aria-label="Small button group">
                                        <a href="/title/{{ $t->id }}/default"><button class="btn btn-primary badge ">Default</button></a>
                                        <form action="/title/{{ $t->id  }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="#" onclick="return confirm('Yakin?')"><button type="submit" class="btn btn-danger badge">Delete</button></a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    
                    </table>
                    <a href="/customer"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                      </svg></a>
                  
                </div>
            </div>
      
</div>

@endsection