<?php

namespace App\Http\Controllers;

use App\Penyaluran;
use App\Penduduk;
use Illuminate\Http\Request;

class PetaSebaranBansosDesaController extends Controller
{
    public function index(Request $request)
    {
        return view('sebaranbansosdesa.map');
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::find($id);
        $penduduk   = Penduduk::where('penyaluran_id', $id)->paginate(10);
        return view('sebaranbansosdesa.show')->with('penyaluran', $penyaluran)->with('penduduk', $penduduk);
    }
}
