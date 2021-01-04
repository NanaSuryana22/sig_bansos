<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Penyaluran;
use App\Pelaporan;
use Charts;

class DesaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $desa_id          = Auth::user()->desas[0]->id;
        $penyaluran       = Penyaluran::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('desa_id', $desa_id)->get();
        $pelaporan        = Pelaporan::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('desa_id', $desa_id)->get();
        $chart_penyaluran = Charts::database($penyaluran, 'area', 'highcharts')
                                    ->title("Penyaluran Per Bulan")
                                    ->elementLabel("Grafik Penyaluran")
                                    ->dimensions(1000, 500)
                                    ->responsive(true)
                                    ->groupByMonth(date('Y'), true);
        $chart_pelaporan = Charts::database($pelaporan, 'bar', 'highcharts')
                                    ->title("Pelaporan Per Bulan")
                                    ->elementLabel("Grafik Pelaporan")
                                    ->dimensions(1000, 500)
                                    ->responsive(true)
                                    ->groupByMonth(date('Y'), true);
        return view('desa.index')->with('chart_penyaluran', $chart_penyaluran)->with('chart_pelaporan', $chart_pelaporan);
    }

    public function getDesa($id)
    {
        $desa = Desa::where('kecamatan_id', $id)->pluck('nama_desa', 'id');
        return response()->json($desa);
    }
}
