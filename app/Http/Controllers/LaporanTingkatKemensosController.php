<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\User;
use App\Desa;
use App\Kecamatan;
use App\Pelaporan;

class LaporanTingkatKemensosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pelaporan = Pelaporan::orderBy('created_at','DESC')->paginate(10);
        return view('laporan_tingkat_kemensos.index')->with('pelaporan', $pelaporan);
    }

    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('laporan_tingkat_kemensos.show')->with('pelaporan', $pelaporan);
    }

    public function update(Request $request, $id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->status_kemensos = $request->status_kemensos;
        $pelaporan->keterangan_kemensos = $request->keterangan_kemensos;
        $pelaporan->save();

        Session::flash("notice", "Laporan berhasil ditindaklanjuti.");
        return redirect()->route("laporan_tingkat_kemensos.show", $id);
    }
}
