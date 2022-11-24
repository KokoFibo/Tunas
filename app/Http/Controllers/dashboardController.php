<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Notapond;
use App\Models\Suratjalan;
use App\Models\Notaponditem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class dashboardController extends Controller
{
    public function index()
    {
        $response = Http::get('https://data.covid19.go.id/public/api/update.json');
        $dataCovid = $response->json();
        $totalCustomer = Customer::all()->count();
        $jumlahNotaPond = Notapond::all()->count();
        $notaPondItem = Notaponditem::all();
        $totalNotaPond = 0;
        foreach ($notaPondItem as $n) {
            $totalNotaPond = $totalNotaPond + $n->quantity * $n->harga;
        }
        $jumlahorder = Order::all()->count();
        $order = Order::all();
        $jumlahOrderRp = 0;
        foreach ($order as $o) {
            $jumlahOrderRp += $o->quantity * $o->harga;
        }
        $jumlahSuratJalanOrder = Suratjalan::all()->count();
        $jumlahNotaOrder = Nota::all()->count();
        $jumlahKaryawan = Karyawan::all()->count();

        return view('dashboard', compact(['totalCustomer', 'jumlahNotaPond', 'totalNotaPond', 'jumlahOrderRp', 'jumlahorder', 'jumlahSuratJalanOrder', 'jumlahNotaOrder', 'jumlahKaryawan','dataCovid']));
    }
}
