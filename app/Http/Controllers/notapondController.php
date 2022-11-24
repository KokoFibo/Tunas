<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Customer;
use App\Models\Notapond;
use App\Models\Hargapond;
use App\Models\Notaponditem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class notapondController extends Controller
{


    public function index()
    {
        $notapond = Notapond::orderBy('no_pond', 'desc')->get();
        return view('/notapond/main', compact(['notapond']));
    }
    public function store(Request $request)
    {
        Notapond::create($request->except(['_token', 'submit']));
        $notapond = notapond::latest()->first();
        $hargapond = Hargapond::all();
        $nomornota = DB::table('notapond')->max('no_pond');
        $nomoridnota = DB::table('notapond')->max('id');
        $customer = Customer::all();


        $notaponditem = DB::table('notaponditem')->where('notapond_id', $notapond->no_pond)->get();



        return view('/notaponditem/main', compact(['notapond', 'hargapond', 'customer', 'nomoridnota', 'nomornota', 'notaponditem']));
    }

    // public function read()
    // {
    //     $notapond = Notapond::orderBy('no_pond', 'desc')->get();
    //     return view('/notapond/read')->with([
    //         'notapond' => $notapond
    //     ]);
    // }

    public function create()
    {
        $nomornota = DB::table('notapond')->max('no_pond');
        if ($nomornota == '')
            $nomornota = 1;
        else {
            $nomornota++;
        }
        $customer = Customer::all();
        $hargapond = Hargapond::all();
        $notapond = Notapond::all();



        return view('notaponditem.main', compact(['hargapond', 'notapond', 'customer', 'nomornota']));
    }
    public function createNota()
    {
        $notapond = Notapond::orderBy('no_pond', 'desc')->get();
        $customer = Customer::all();
        $nomornota = DB::table('notapond')->max('no_pond');
        if ($nomornota == '')
            $nomornota = 1;
        else {
            $nomornota++;
        }
        return view('/notaponditem/main', compact(['notapond', 'customer', 'nomornota']));
    }

    public function delete($id)
    {

        $item = DB::table('notaponditem')->where('notapond_id', $id)->delete();
        DB::table('notapond')->where('id', $id)->delete();
        return back();
    }

    public function edit($id)
    {

        // $no_pond = DB::table('notapond')->where('id', $id)->pluck('no_pond');
        $no_pond = Notapond::all();
        $notaponditem = DB::table('notaponditem')->where('notapond_id', $id)->get();


        return view('notapond/edit', compact(['notaponditem']));
    }
    public function destroy($id)
    {
        $data = Notaponditem::find($id);
        $data->delete();
        return back();
    }
    public function edititem($id)
    {
        $notaponditem = Notaponditem::find($id);
        $harga = Hargapond::all();

        return view('/notapond/edititem', compact(['notaponditem', 'harga']));
    }

    public function itemupdate($id, Request $request)
    {
        $notaponditem = Notaponditem::find($id);
        $nopond = $notaponditem->notapond_id;
        $notaponditem->update($request->except(['_token', 'submit']));
        $notaponditem = DB::table('notaponditem')->where('notapond_id', $nopond)->get();
        return view('notapond/edit', compact(['notaponditem']));
    }
    public function show($id)
    {
        $data = DB::table('notapond')
            ->join('notaponditem', 'notapond.id', '=', 'notaponditem.notapond_id')
            ->where('notapond.id', $id)
            ->get();
        $customerName = Notapond::find($id)->customer->name;
        return view('notapond.show', compact('data', 'customerName'));
    }

    public function search(Request $request)
    {
        $output = "";
        $data = DB::table('customer')
            ->join('notapond', 'customer.id', '=', 'notapond.customer_id')
            ->select('customer.*', 'notapond.*')
            ->where('name', 'Like', '%' . $request->search . '%')
            ->orWhere('tanggal', 'Like', '%' . $request->search . '%')->get();
        foreach ($data as $n) {
            $total = 0;
            $notaponditem = DB::table('notaponditem')->where('notapond_id', $n->id)->get();
            foreach ($notaponditem as $t) {
                $total = $total + $t->quantity * $t->harga;
            }
            $output .=
                '<tr>
                <td>' . "PND-" . $n->no_pond . '</td>
                <td>' . $n->name . '</td>
                <td>' . $n->tanggal . '</td>
                <td>' . number_format($total) . '</td>
                <td>
                  <div class="btn-group">
                      <a href="/notapond/show/' . $n->id  . ' "><button type="submit" name="submit" class="btn btn-success btn-sm">Show</button></a>
                      <a href="/notapond/edit/' . $n->id  . ' "><button type="submit" name="submit" class="btn btn-warning btn-sm">Update</button></a>
                      <a href="/notapond/delete/' . $n->id  . ' " onclick="return confirm("Yakin?")"><button class="btn btn-danger btn-sm">Delete</button></a> 
                  
                  </div>
                </td>
              </tr>';
        }
        return response($output);
    }
}
