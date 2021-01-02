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

class TindakLanjutPelaporanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $desa_user = Desa::where('user_id', Auth::user()->id)->pluck('id');
        $pelaporan = Pelaporan::where('desa_id', $desa_user)->orderBy('created_at','DESC')->paginate(10);
        return view('laporan_tingkat_desa.index')->with('pelaporan', $pelaporan);
    }

    public function update(Request $request, $id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->status_desa = $request->status_desa;
        $pelaporan->keterangan_desa = $request->keterangan_desa;
        $pelaporan->save();

        Session::flash("notice", "Laporan berhasil ditindaklanjuti.");
        return redirect()->route("laporan_tingkat_desa.show", $id);
    }

    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        $desa_user = Desa::where('user_id', Auth::user()->id)->pluck('id');
        return view('laporan_tingkat_desa.show')->with('pelaporan', $pelaporan)->with('desa_user', $desa_user);
    }
}
