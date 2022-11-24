<div>
    @include('livewire.customers.create')
    @include('livewire.customers.delete')
    @include('livewire.customers.show')
    @include('livewire.customers.update')
    <div class="container">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Customer livewire
                        <a href="/"><button class="btn btn-info btn-sm float-end" >X</button></a>
                        <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add</button>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div>
                            <input type="text" placeholder="Search..." wire:model="search">
                        </div>
                        <div>
                            <select wire:model="sortField" >
                                <option value="id">ID</option>
                                <option value="name">Name</option>
                                <option value="city">City</option>
                                <option value="email">Email</option>
                            </select>
                        </div> 
                        <div>
                            <select wire:model="sortAsc" >
                                <option value="1">Ascending</option>
                                <option value="0">Descending</option>
                            </select>
                        </div>
                        <div>
                            <select wire:model="perPage" >
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                    </div>
                       
                    </div>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Nama</th>
                                <th>city</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $c)
                                <tr>
                                    <td>{{ $c->title->name_title  }}</td>
                                    <td>{{ $c->name  }}</td>
                                    <td>{{ $c->city  }}</td>
                                    <td>{{ $c->phone  }}</td>
                                    <td>{{ $c->email  }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success btn-sm" wire:click="show({{ $c->id }})" data-bs-toggle="modal" data-bs-target="#showCustomerModal">Show</button>
                                            <button type="button" class="btn btn-warning btn-sm" wire:click="edit({{ $c->id }})" data-bs-toggle="modal" data-bs-target="#updateCustomerModal">Update</button>
                                            <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $c->id }})" data-bs-toggle="modal" data-bs-target="#deleteCustomerModal">Delete</button>
                                          </div>
                                    </td>
                                </tr>

                            @endforeach()

                        </tbody>
                    </table>
                    {{ $customer->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
 