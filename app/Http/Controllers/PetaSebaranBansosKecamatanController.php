<?php

namespace App\Http\Controllers;

use App\Penyaluran;
use App\Penduduk;
use Illuminate\Http\Request;


class PetaSebaranBansosKecamatanController extends Controller
{
    public function index(Request $request)
    {
        return view('sebaranbansoskecamatan.map');
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::find($id);
        $penduduk   = Penduduk::where('penyaluran_id', $id)->paginate(10);
        return view('sebaranbansoskecamatan.show')->with('penyaluran', $penyaluran)->with('penduduk', $penduduk);
    }
}
