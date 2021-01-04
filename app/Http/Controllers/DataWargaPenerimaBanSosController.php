<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Penyaluran;
use App\Desa;
use Auth;
use Session;

class DataWargaPenerimaBanSosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function data_penerima_bansos($penyaluran_id) {
        $penduduk   = Penduduk::where('penyaluran_id', $penyaluran_id)->paginate(10);
        $penyaluran = Penyaluran::find($penyaluran_id);
        $desa_id    = Desa::where('user_id', Auth::user()->id)->pluck('id');
        return view('data_penduduk.warga_penerima_bansos')->with('penduduk', $penduduk)->with('penyaluran', $penyaluran)->with('desa_id', $desa_id);
    }
}
