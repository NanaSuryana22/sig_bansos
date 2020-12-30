<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('desa.index');
    }

    public function getDesa($id)
    {
        $desa = Desa::where('kecamatan_id', $id)->pluck('nama_desa', 'id');
        return response()->json($desa);
    }
}
