<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Suratjalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class sjorderController extends Controller
{

    public $customer;
    public function index()
    {
        //$suratjalan = Suratjalan::all();
        $suratjalan = Suratjalan::orderBy('id', 'desc')->paginate(10);
        return view('sjorder.main', compact('suratjalan'));
    }

    public function getnamabarang(Request $request)
    {
        $customer_id = $request->customer_id;

        $order = Order::where('customer_id', $customer_id)->get();
        foreach ($order as $o) {
            echo "<option value='$o->id'>$o->nama_barang</option>";
        }
    }

    public function create(Request $request)
    {
        // $customer_id = $request->customer_id;
        // $customer = Customer::where('id', $customer_id)->first();
        // //$order = Order::select('nama_barang, id')->where('customer_id', $customer_id)->get();
        // $order = Order::where('customer_id', $customer_id)->get();
        // $nomorSj = DB::table('suratjalan')->max('no_sj');
        // if ($nomorSj == '')
        //     $nomorSj = 1;
        // else {
        //     $nomorSj++;
        // }

        $order = Order::distinct()->get(['customer_id']);
        $nomorSj = DB::table('suratjalan')->max('no_sj');
        if ($nomorSj == '')
            $nomorSj = 1;
        else {
            $nomorSj++;
        }

        return view('sjorder.suratjalan', compact(['order', 'nomorSj']));
    }
    public function save(Request $request)
    {
        $data['order_id'] = $request->order_id;
        $data['no_sj'] = $request->no_sj;
        $data['quantity'] = $request->quantity;
        $data['tanggal'] = $request->tanggal;
        Suratjalan::insert($data);
        //$order = Order::distinct()->get(['customer_id']);
        //$order2 = Order::all();
        $suratjalan = Suratjalan::orderBy('id', 'desc')->get();
        return view('sjorder.main', compact('suratjalan'));
    }

    public function search(Request $request)
    {
        $output = "";

        $suratjalan = Suratjalan::where('order_id', 'Like', '%' . $request->search . '%')
            ->orWhere('no_sj', 'Like', '%' . $request->search . '%')
            ->orWhere('tanggal', 'Like', '%' . $request->search . '%')
            ->orWhere('nota', 'Like', '%' . $request->search . '%')->get();
        foreach ($suratjalan as $sj) {
            $output .=
                '<tr>
                <td>' . Str::headline($sj->order->customer->name) . '</td>
                <td>' . Str::headline($sj->order->nama_barang) . '</td>
                <td>TJB-' . $sj->no_sj . '</td>
                <td>' . number_format($sj->quantity) . '</td>
                <td>' . number_format($sj->order->harga) . '</td>
                <td>' . $sj->tanggal . '</td>
            </tr>';
        }
        return response($output);
    }
}
 