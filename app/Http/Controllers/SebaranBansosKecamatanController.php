<?php

namespace App\Http\Controllers;

use App\Penyaluran;
use Illuminate\Http\Request;

class SebaranBansosKecamatanController extends Controller
{
    public function index()
    {
        $this->authorize('manage_penyaluran');

        $penyaluranQuery = Penyaluran::query();
        $penyaluranQuery->where('bantuan_id', 'like', '%'.request('q').'%');
        $penyalurans = $penyaluranQuery->paginate(25);

        return view('sebaranbansoskecamatan.index', compact('penyalurans'));
    }
}
