<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Penyaluran;
use Session;

class DataWargaPenerimaBanSosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function data_penerima_bansos($penyaluran_id) {
        $penduduk   = Penduduk::where('penyaluran_id', $penyaluran_id)->paginate(10);
        return view('data_penduduk.warga_penerima_bansos')->with('penduduk', $penduduk);
    }
}
