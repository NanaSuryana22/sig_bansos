<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Pelaporan;
use Charts;

class MasyarakatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user_id         = Auth::user()->id;
        $pelaporan       = Pelaporan::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('user_id', $user_id)->get();
        $chart_pelaporan = Charts::database($pelaporan, 'bar', 'highcharts')
                                    ->title("Pelaporan Per Bulan")
                                    ->elementLabel("Grafik Pelaporan")
                                    ->dimensions(1000, 500)
                                    ->responsive(true)
                                    ->groupByMonth(date('Y'), true);
        return view('masyarakat.index')->with('chart_pelaporan', $chart_pelaporan);
    }
}
