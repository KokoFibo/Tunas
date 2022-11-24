<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class karyawanController extends Controller
{

    public function index()
    {

        return view('karyawan.main');
    }


    public function create()
    {
        return view('karyawan.create');
    }


    public function store(Request $request)
    {

        $data['nama'] = $request->nama;
        $data['harian'] = $request->harian;
        $data['lembur'] = $request->lembur;
        $data['bulanan'] = $request->bulanan;
        $data['status'] = $request->status;
        Karyawan::insert($data);
    }


    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit')->with([
            'karyawan' => $karyawan
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Karyawan::findOrFail($id);
        $data['nama'] = $request->nama;
        $data['harian'] = $request->harian;
        $data['lembur'] = $request->lembur;
        $data['bulanan'] = $request->bulanan;
        $data['status'] = $request->status;
        $data->save();
    }


    public function destroy($id)
    {
        $data = Karyawan::findOrFail($id);
        $data->delete();
    }
    public function read()
    {
        $karyawan = Karyawan::all();

        // $karyawan = Karyawan::orderBy('id', 'DESC')->paginate(5);

        return view('karyawan.read')->with(['karyawan' => $karyawan]);
    }

    public function absensi()
    {
        // $karyawan = Karyawan::all();
        $karyawan = DB::table('karyawan')->where('status', 'Aktif')->get();
        return view('karyawan.absensi', compact(['karyawan']));
    }

    public function downloadPDF()
    {
        $karyawan = Karyawan::all();
        $pdf = PDF::loadview('karyawan.absensiToPdf', compact(['karyawan']))->setPaper('a4')->setOrientation('landscape');
        $pdf->setOption('header-left', '[page]');

        //  return $pdf->download('absensi.pdf');
        return $pdf->stream('Absensi{{week()}}.pdf');
    }
}
