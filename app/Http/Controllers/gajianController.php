<?php

namespace App\Http\Controllers;

use App\Models\Gajian;
use App\Models\Karyawan;
use App\Models\Hargapond;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gajianController extends Controller
{


    public function index()
    {

        $gajian = Gajian::orderBy('id', 'desc')->get();
        $karyawan = Karyawan::all();

        return view('gajian.main', compact(['gajian', 'karyawan']));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data['karyawan_id'] = $request->karyawan_id;

        $data['jumlah_hari_kerja'] = $request->jumlah_hari_kerja;
        $data['jumlah_jam_lembur'] = $request->jumlah_jam_lembur;
        $data['tanggal'] = $request->tanggal;
        $kid = Karyawan::where('id', '=', $data['karyawan_id'])->first();


        if ($kid != null && $kid->status == 'Aktif') {

            Gajian::insert($data);
        }
    }


    public function show($id)
    {
        $gajian = gajian::findOrFail($id);
        return view('gajian.edit')->with([
            'gajian' => $gajian
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Gajian::findOrFail($id);

        // $data['karyawan_id'] = $request->karyawan_id;

        $data->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        $data->jumlah_jam_lembur = $request->jumlah_jam_lembur;
        //$data->tanggal = $request->tanggal;



        // $data['jumlah_hari_kerja'] = $request->jumlah_hari_kerja;
        // $data['jumlah_jam_lembur'] = $request->jumlah_jam_lembur;
        // $data['tanggal'] = $request->tanggal;
        $data->save();
    }


    public function destroy($id)
    {
        $data = Gajian::find($id);
        $data->delete();
    }

    public function read()
    {
        $gajian = Gajian::orderBy('id', 'DESC')->get();
        $karyawan = Karyawan::all();
        return view('gajian.read', compact(['gajian', 'karyawan']));
    }
}
