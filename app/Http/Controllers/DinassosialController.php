<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Desa;
use App\Bantuan;

class DinassosialController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('dinas_sosial.index');
    }

    public function desa_list($kecamatan_id)
    {
        $desa = Desa::where('kecamatan_id', $kecamatan_id)->pluck('nama_desa', 'id');
        return response()->json($desa);
    }

    public function getQuota($bantuan_id)
    {
        $bantuan = Bantuan::where('id', $bantuan_id)->pluck('quota');
        return response()->json($bantuan);
    }

}
