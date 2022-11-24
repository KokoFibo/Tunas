@extends('layouts.main')
@section('container')
    <style>
        .ahref:hover {
            transform: translatey(-10px);

        }

        .ahref {
            text-decoration: none;
            margin-right: 15px;
        }

        .kartu {
            width: 250px;
            padding: 10px;
            display: flex;
            flex-direction: colomn;
            justify-content: center;
            align-items: center;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        }
    </style>
    <div class="container d-flex justify-content-evenly mt-5 ">

        <div class="row">
            <div class="col-sm-12">
                <div class="row container d-flex justify-content-evenly mt-5">
                    <div>

                        <a href="/customer" class="ahref">
                            <div class="card mx-auto kartu">
                                <img src="{{ asset('tunas') }}/img/group-people.png" class="card-img-top" alt="customer"
                                    style="width: 150px;  ">
                                <h2>Customer</h2>
                                <h5>Total Customer : {{ $totalCustomer }}</h5>
                            </div>
                        </a>
                    </div>


                    <div>

                        <a href="/notapond/main" class="ahref">
                            <div class="card mx-auto kartu">
                                <img src="{{ asset('tunas') }}/img/group-people.png" class="card-img-top" alt="customer"
                                    style="width: 150px;  ">
                                <h2>Pond</h2>
                                <h5>Jumlah Nota : {{ $jumlahNotaPond }}</h5>
                                <h5>Rp. {{ number_format($totalNotaPond) }}</h5>
                            </div>
                        </a>
                    </div>



                    <div>

                        <a href="/order" class="ahref">
                            <div class="card mx-auto kartu">
                                <img src="{{ asset('tunas') }}/img/group-people.png" class="card-img-top" alt="customer"
                                    style="width: 150px;  ">
                                <h2>Order</h2>
                                <h5>Jumlah Order {{ $jumlahorder }}</h5>
                                <h5>Rp. {{ number_format($jumlahOrderRp) }} </h5>
                                <h5>Jumlah surat jalan {{ $jumlahSuratJalanOrder }} </h5>
                                <h5>Jumlah nota {{ $jumlahNotaOrder }}</h5>
                            </div>
                        </a>
                    </div>




                    <div>

                        <a href="/karyawan" class="ahref">
                            <div class="card mx-auto kartu">
                                <img src="{{ asset('tunas') }}/img/group-people.png" class="card-img-top" alt="customer"
                                    style="width: 150px;  ">
                                <h2>Karyawan</h2>
                                <h5>Jumlah Karyawan {{ $jumlahKaryawan }}</h5>

                            </div>
                        </a>
                    </div>



                    <div>

                        {{-- <a href="/covid" class="ahref">
                            <div class="card mx-auto kartu">
                                <img src="{{ asset('tunas') }}/img/group-people.png" class="card-img-top" alt="customer"
                                    style="width: 150px;  ">
                                <h2>Data Covid</h2>
                                <h5>Last Update: </h5>
                                <h5>{{ $dataCovid['update']['penambahan']['created'] }}</h5>
                                <h5>Jumlah positif :
                                    {{ number_format($dataCovid['update']['penambahan']['jumlah_positif']) }}
                                </h5>
                                <h5>Jumlah sembuh: {{ number_format($dataCovid['update']['penambahan']['jumlah_sembuh']) }}
                                </h5>
                                <h5>Jumlah dirawat:
                                    {{ number_format($dataCovid['update']['penambahan']['jumlah_dirawat']) }}
                                </h5>
                                <h5>Jumlah meninggal:
                                    {{ number_format($dataCovid['update']['penambahan']['jumlah_meninggal']) }}
                                </h5>
                            </div>

                        </a> --}}
                    </div>
                </div>
            </div>
        </div>





    </div>






    </div>
@endsection
