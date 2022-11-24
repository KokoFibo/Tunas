<?php

namespace App\Http\Controllers;

use App\Models\Suratjalanitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class suratjalanitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['suratjalan_id'] = $request->suratjalan_id;
        $data['order_id'] = $request->order_id;
        $data['quantity'] = $request->quantity;

        Suratjalanitem::insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function read()
    {
        //$suratjalanid = DB::table('suratjalan')->max('id');
        //$data = DB::table('suratjalanitem')->where('suratjalan_id', $suratjalanid)->get();
        //$data = Notaponditem::orderBy('id', 'DESC')->get();
        $data = Suratjalanitem::all();
        return view('suratjalanitem.read', compact(['data']));
    }
}
