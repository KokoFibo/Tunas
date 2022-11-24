<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notapond;
use App\Models\Hargapond;
use App\Models\Notaponditem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class notaponditemController extends Controller
{


    public function store(Request $request)
    {
        $data['no_pond'] = $request->no_pond;
        $data['tanggal'] = $request->tanggal;
        $data['customer_id'] = $request->customer_id;
        Notapond::insert($data);
        $notapond_id = Notapond::max('id');
        $nama_barang = $request->nama_barang;
        $quantity = $request->quantity;
        $harga = $request->harga;
        for ($i = 0; $i < count($nama_barang); $i++) {

            $data = [
                'notapond_id' => $notapond_id,
                'nama_barang' => $nama_barang[$i],
                'quantity' => $quantity[$i],
                'harga' => $harga[$i]

            ];
            DB::table('notaponditem')->insert($data);
        }
        $notapond = Notapond::all();
        return view('/notapond/main', compact(['notapond']));
    }

    public function destroy($id)
    {
        $data = Notaponditem::find($id);
        $data->delete();
    }





    public function read()
    {
        $notaid = DB::table('notapond')->max('id');
        $data = DB::table('notaponditem')->where('notapond_id', $notaid)->get();
        //$data = Notaponditem::orderBy('id', 'DESC')->get();
        return view('/notaponditem/read')->with(['data' => $data]);
    }
}
