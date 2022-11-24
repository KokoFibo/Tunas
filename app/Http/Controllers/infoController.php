<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class infoController extends Controller
{
    public function info()
    {

        $response = Http::get('https://data.covid19.go.id/public/api/prov.json');
        $response1 = Http::get('https://data.covid19.go.id/public/api/update.json');
        $data = $response->json();

        $data1 = $response1->json();
        return view('covid', compact(['data', 'data1']),  [
            "title" => "Data Covid"

        ]);
    }
}
