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

class LaporanTingkatKecamatanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatan_user = Kecamatan::where('user_id', Auth::user()->id)->pluck('id');
        $pelaporan      = Pelaporan::where('kecamatan_id', $kecamatan_user)->orderBy('created_at','DESC')->paginate(10);
        return view('laporan_tingkat_kecamatan.index')->with('pelaporan', $pelaporan);
    }

    public function show($id)
    {
        $pelaporan      = Pelaporan::find($id);
        $kecamatan_user = Kecamatan::where('user_id', Auth::user()->id)->pluck('id');
        return view('laporan_tingkat_kecamatan.show')->with('pelaporan', $pelaporan)->with('kecamatan_user', $kecamatan_user);
    }

    public function update(Request $request, $id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->status_kecamatan = $request->status_kecamatan;
        $pelaporan->keterangan_kecamatan = $request->keterangan_kecamatan;
        $pelaporan->save();

        Session::flash("notice", "Laporan berhasil ditindaklanjuti.");
        return redirect()->route("laporan_tingkat_kecamatan.show", $id);
    }
}
