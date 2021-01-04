<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Desa;
use App\Bantuan;
use App\Charts\MasyarakatChart;
use Charts;
use App\Penyaluran;
use App\Pelaporan;

class DinassosialController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $chart = Penyaluran::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $penyaluran = Charts::database($chart, 'area', 'highcharts')
                        ->title("Penyaluran Per Bulan")
                        ->elementLabel("Grafik Penyaluran")
                        ->dimensions(1000, 500)
                        ->responsive(true)
                        ->groupByMonth(date('Y'), true);
        $graphic = Pelaporan::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $pelaporan = Charts::database($graphic, 'bar', 'highcharts')
                        ->title("Pelaporan Per Bulan")
                        ->elementLabel("Grafik Pelaporan")
                        ->dimensions(1000, 500)
                        ->responsive(true)
                        ->groupByMonth(date('Y'), true);
        return view('dinas_sosial.index')->with('penyaluran', $penyaluran)->with('pelaporan', $pelaporan);
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
