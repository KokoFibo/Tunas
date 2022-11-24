@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Customer</h2>
            </div>
            <div class="card-body">
                <div class="col-md-5">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search...">
                </div>

                <div class="table-responsive-sm">

                    <table class="table table-bordered table-hover table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>
                                    <button class="btn btn-primary btn-sm" onClick="create()">
                                        <i class="fa fa-plus-circle"> Add</i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('customer.customerData')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}

    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page"></div>
                </div>

            </div>
        </div>
    </div>


    {{-- end modal --}}
    <script>
        function read() {
            $.get("{{ url('/customer/read') }}", {}, function(data, status) {
                $("tbody").html(data);
            });
        }

        function create() {
            $.get("{{ url('/customer/create') }}", {}, function(data, status) {
                $('#modalTitle').html('Add Customer');
                $('#page').html(data);
                $('#customerModal').modal('show');
            });
        }

        function show(id) {
            $.get("{{ url('/customer/show') }}/" + id, {}, function(data, status) {
                $('#modalTitle').html('Data Customer');
                $('#page').html(data);
                $('#customerModal').modal('show');
            });
        }

        function edit(id) {
            $.get("{{ url('/customer/edit') }}/" + id, {}, function(data, status) {
                $('#modalTitle').html('Data Customer');
                $('#page').html(data);
                $('#customerModal').modal('show');
            });
        }


        function store() {
            var title_id = $('#title_id:checked').val();
            var name = $('#name').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var phone = $('#phone').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            $.ajax({
                type: 'get',
                url: "{{ url('/customer/store') }}",
                data: "title_id=" + title_id + "&name=" + name + "&address=" + address + "&city=" + city +
                    "&phone=" + phone + "&mobile=" + mobile + "&email=" + email,
                success: function(data) {
                    $('.btn-close').click();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data sudah berhasil di tambah',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    read();
                }
            });
        }

        function update(id) {
            var title_id = $('#title_id:checked').val();
            var name = $('#name').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var phone = $('#phone').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            $.ajax({
                type: 'get',
                url: "{{ url('/customer/update') }}/" + id,
                data: "title_id=" + title_id + "&name=" + name + "&address=" + address + "&city=" + city +
                    "&phone=" + phone + "&mobile=" + mobile + "&email=" + email,
                success: function(data) {
                    $('.btn-close').click();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data sudah berhasil di update',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    read();
                }
            });
        }

        function destroy(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'get',
                        url: "{{ url('/customer/destroy') }}/" + id,
                        // data: "title_id="+title_id+"&name="+name+"&address="+address+"&city="+city+"&phone="+phone+"&mobile="+mobile+"&email="+email,
                        success: function(data) {
                            $('.btn-close').click();
                            read();
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Data sudah dihapus.',
                        'success'
                    )
                }
            })
        }
    </script>

    <script>
        // function utk search dan pagination
        $(document).ready(function() {
            function fetch_data(page, query) {
                $.ajax({
                    url: "/customer/fetch_data?page=" + page + "&query=" + query,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }
            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var page = $('#hidden_page').val();
                fetch_data(page, query);
            });
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var query = $('#search').val();
                fetch_data(page, query);
            });
        });
    </script>
@endsection
