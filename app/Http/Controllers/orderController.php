<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        $customer = Customer::all();
        return view('order.main', compact(['order', 'customer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('order.create', compact(['customer']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['customer_id'] = $request->customer_id;
        $data['nama_barang'] = $request->nama_barang;
        $data['quantity'] = $request->quantity;
        $data['harga'] = $request->harga;
        $data['tanggal'] = $request->tanggal;
        $data['keterangan'] = $request->keterangan;
        Order::insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer = Customer::all();
        $order = Order::findOrFail($id);
        return view('order.edit', compact(['customer', 'order']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = Order::findOrFail($id);

        //$data['customer_id'] = $request->customer_id;
        $data['nama_barang'] = $request->nama_barang;
        $data['quantity'] = $request->quantity;
        $data['harga'] = $request->harga;
        $data['tanggal'] = $request->tanggal;
        $data['keterangan'] = $request->keterangan;
        $data->save();
    }

    public function done(Request $request, $id)
    {

        $data = Order::findOrFail($id);

        $data['done'] = $request->done;

        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::findOrFail($id);
        $data->delete();
    }

    public function read()
    {
        $order = order::withSum('suratjalan', 'quantity')->get();

        //$order = Order::orderBy('id', 'DESC')->paginate(5);

        return view('order.read')->with(['order' => $order]);
    }
}
