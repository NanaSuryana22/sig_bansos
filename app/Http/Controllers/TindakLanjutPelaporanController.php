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

    public function list_pelaporan_desa()
    {
        $desa_user = Desa::where('user_id', Auth::user()->id)->pluck('id');
        $pelaporan = Pelaporan::where('desa_id', $desa_user)->orderBy('created_at','DESC')->paginate(10);
        return view('pelaporan.desa')->with('pelaporan', $pelaporan);
    }
}
