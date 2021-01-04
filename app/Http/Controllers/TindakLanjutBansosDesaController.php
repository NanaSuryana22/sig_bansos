<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyaluran;
use App\Kecamatan;
use App\Desa;
use DB;
use Auth;
use Session;

class TindakLanjutBansosDesaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $desa_id = Auth::user()->desas[0]->id;
        $penyaluran = Penyaluran::where('desa_id', $desa_id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('tindaklanjutdesa.index')->with('penyaluran', $penyaluran);
    }

    public function show($id) {
        $penyaluran = Penyaluran::find($id);
        $desa_id    = Desa::where('user_id', Auth::user()->id)->pluck('id');
        return view('tindaklanjutdesa.show')->with('penyaluran', $penyaluran)->with('desa_id', $desa_id);
    }

    public function update(Request $request, $id) {
        $penyaluran = Penyaluran::find($id);
        $penyaluran->status_tracking_desa = $request->status_tracking_desa;
        $penyaluran->keterangan_desa = $request->keterangan_desa;
        $penyaluran->save();

        Session::flash("notice", "Status Penyaluran Berhasil Diperbaharui, Silahkan import data penduduk penerima bantuan sosial.");
        return redirect()->route("penduduk.show", $id);
    }
}
