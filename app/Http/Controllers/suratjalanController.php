<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Title;
use App\Models\Customer;
use App\Models\Suratjalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class suratjalanController extends Controller
{

    public function index()
    {


        $nomorSjTerakhir = DB::table('suratjalan')->max('id');
        $customer = Customer::all();

        $nomorSjItem = DB::table('suratjalanitem')->max('suratjalan_id');

        $order = Order::distinct()->get(['customer_id']);



        if ($nomorSjTerakhir != $nomorSjItem) {
            DB::table('suratjalan')->where('id', $nomorSjTerakhir)->delete();
        }
        $suratjalan = Suratjalan::orderBy('no_sj', 'desc')->get();
        $customer = Customer::all();
        $nomorSj = DB::table('suratjalan')->max('no_sj');
        if ($nomorSj == '')
            $nomorSj = 1;
        else {
            $nomorSj++;
        }

        return view('suratjalan.main', compact(['suratjalan', 'customer', 'nomorSj', 'order']));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Suratjalan::create($request->except(['_token', 'submit']));
        $customerid = $request->customer_id;


        $suratjalan = Suratjalan::latest()->first();
        // $hargapond = Hargapond::all();
        $nomorSj = DB::table('suratjalan')->max('no_sj');
        $nomoridSj = DB::table('suratjalan')->max('id');
        $customer = Customer::all();
        $title = Title::all();
        $order = DB::table('order')->where('customer_id', $customerid)->get();


        $suratjalanitem = DB::table('suratjalanitem')->where('suratjalan_id', $suratjalan->no_sj)->get();



        return view('suratjalanitem.main', compact(['suratjalan',  'order', 'customer', 'customerid', 'nomoridSj', 'nomorSj', 'suratjalanitem', 'title']));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
