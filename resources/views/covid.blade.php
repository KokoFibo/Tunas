{{-- {{ dd($data1['update']['penambahan']['jumlah_positif']); }} --}}

@extends('layouts.main')
@section('container')
    <style>
        .hasil {
            width: 200px;
            border: 2px solid green;
            border-radius: 5px;
            background-color: #f0fdf0;
            margin: auto;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Data Covid Indonesia per {{ $data1['update']['penambahan']['created'] }}</h2>
            </div>

            <div class="ml-3 mt-4">
                <div class="row">
                    <div class="col-3 hasil">
                        <h4>Positif : {{ number_format($data1['update']['penambahan']['jumlah_positif']) }}</h4>
                    </div>
                    <div class="col-3 hasil">
                        <h4>Sembuh : {{ number_format($data1['update']['penambahan']['jumlah_sembuh']) }}</h4>
                    </div>
                    <div class="col-3 hasil">
                        <h4>Dirawat : {{ number_format($data1['update']['penambahan']['jumlah_dirawat']) }}</h4>
                    </div>
                    <div class="col-3 hasil">
                        <h4>Meninggal : {{ number_format($data1['update']['penambahan']['jumlah_meninggal']) }}</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">

                {{-- <div class="container "> --}}
                <table class="table table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>Propinsi</th>
                            <th>Jumlah Kasus</th>
                            <th>Sembuh</th>
                            <th>Meninggal</th>
                            <th>Dirawat</th>
                            <th>Laki laki</th>
                            <th>Perempuan</th>
                            <th>Positif</th>
                            <th>Sembuh</th>
                            <th>Meninggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($data['list_data']); $i++)
                            <tr>
                                <td>{{ $data['list_data'][$i]['key'] }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jumlah_kasus']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jumlah_sembuh']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jumlah_meninggal']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jumlah_dirawat']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jenis_kelamin'][0]['doc_count']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['jenis_kelamin'][1]['doc_count']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['penambahan']['positif']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['penambahan']['sembuh']) }}</td>
                                <td>{{ number_format($data['list_data'][$i]['penambahan']['meninggal']) }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                {{-- </div> --}}
            </div>
        </div>
    </div>


    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script> --}}
@endsection
