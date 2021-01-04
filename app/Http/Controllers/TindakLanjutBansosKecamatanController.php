<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyaluran;
use App\Penduduk;
use App\Kecamatan;
use App\Desa;
use DB;
use Auth;
use Session;

class TindakLanjutBansosKecamatanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $kecamatan_id = Auth::user()->kecamatans[0]->id;
        $penyaluran = Penyaluran::where('kecamatan_id', $kecamatan_id)->orderBy('created_at', 'desc')->paginate(10);;
        return view('tindaklanjutkecamatan.index')->with('penyaluran', $penyaluran);
    }

    public function show($id) {
        $penyaluran = Penyaluran::find($id);
        $penduduk   = Penduduk::where('penyaluran_id', $id);
        $kec_id     = Kecamatan::where('user_id', Auth::user()->id)->pluck('id');
        return view('tindaklanjutkecamatan.show')->with('penyaluran', $penyaluran)->with('penduduk', $penduduk)->with('kec_id', $kec_id);
    }

    public function update(Request $request, $id) {
        $penyaluran = Penyaluran::find($id);
        $penyaluran->status_tracking_kecamatan = $request->status_tracking_kecamatan;
        $penyaluran->keterangan_kecamatan = $request->keterangan_kecamatan;
        $penyaluran->save();

        Session::flash("notice", "Status Penyaluran Berhasil Diperbaharui.");
        return redirect()->route("tindaklanjutbansoskecamatan.show", $id);
    }
}
