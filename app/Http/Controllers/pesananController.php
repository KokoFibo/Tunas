<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Customer;
use Illuminate\Http\Request;

class pesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('/pesanan/main', compact(['pesanan']), [
            "title" => "Pesanan"

        ]);
    }
    public function create()
    {
        $customer = Customer::all();
        return view('/pesanan/create', compact(['customer']), [
            "title" => "Create"
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'nama_barang' => 'required',
            'quantity' => 'numeric |required',
            'harga' => 'numeric | required'

        ]);


        Pesanan::create($request->except(['_token', 'submit']));
        $customer = Pesanan::latest()->first();

        return redirect('/pesanan/main');
    }
    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        $customer = Customer::all();


        return view('/pesanan/edit', compact(['pesanan', 'customer']), [
            "title" => "Edit"
        ]);
    }
    public function update($id, Request $request)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->update($request->except(['_token', 'submit']));

        return redirect('/pesanan/main');
    }
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect('/pesanan/main');
    }
}
