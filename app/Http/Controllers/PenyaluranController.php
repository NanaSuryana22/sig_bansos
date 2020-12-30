<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Penyaluran;
use App\Bantuan;
use App\Kecamatan;
use App\Desa;
use DB;
use Auth;
use Session;
use App\Http\Requests\PenyaluranRequest;

class PenyaluranController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $penyaluran = Penyaluran::orderBy('created_at', 'desc')->paginate(10);
        return view('penyaluran.index')->with('penyaluran', $penyaluran);
    }

    public function getDesa($id)
    {
        $desa = Desa::where('kecamatan_id', $id)->pluck('nama_desa', 'id');
        return response()->json($desa);
    }

    public function getQuota($id)
    {
        $quota = Bantuan::where('id', $id)->pluck('quota');
        return response()->json($quota);
    }

    public function create()
    {
        $bantuan   = Bantuan::all()->where('status', 'Aktif');
        $kecamatan = Kecamatan::all();
        $desa      = Desa::all();
        return view('penyaluran.tambah')->with('bantuan', $bantuan)->with('kecamatan', $kecamatan)->with('desa', $desa);
    }

    public function store(PenyaluranRequest $request)
    {
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $desa = Desa::find($request->desa_id);
        $penyaluran_last = Penyaluran::latest('id')->first()->id;
        $coordinate = "0.00{$penyaluran_last}0000";
        $kec_lat = $kecamatan->lat - $coordinate;
        $kec_long= $kecamatan->long + $coordinate;
        $kel_lat = $desa->lat - $coordinate;
        $kel_long = $desa->long + $coordinate;

        $penyaluran = new Penyaluran;
        $penyaluran->bantuan_id = $request->bantuan_id;
        $penyaluran->kecamatan_id = $request->kecamatan_id;
        $penyaluran->desa_id = $request->desa_id;
        $penyaluran->status_tracking_kecamatan = $request->status_tracking_kecamatan;
        $penyaluran->status_tracking_desa = $request->status_tracking_desa;
        $penyaluran->keterangan_kemensos  = $request->keterangan_kemensos;
        $penyaluran->quota = $request->quota;
        $penyaluran->kec_lat = $kec_lat;
        $penyaluran->kec_long =$kec_long;
        $penyaluran->kel_lat = $kel_lat;
        $penyaluran->kel_long = $kel_long;
        $penyaluran->save();

        $bantuan = Bantuan::find($request->bantuan_id);
        $bantuan->quota = $bantuan->quota - $request->quota;
        $bantuan->save();

        Session::flash("notice", "Penyaluran Bantuan Sosial Baru Berhasil Ditambahkan");
        return redirect()->route("penyaluran.index");
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::find($id);
        $penduduk   = Penduduk::where('penyaluran_id', $id);
        return view('penyaluran.show')->with('penyaluran', $penyaluran)->with('penduduk', $penduduk);
    }

    public function data_penduduk($penyaluran_id)
    {
        $penduduk = Penduduk::where('penyaluran_id', $penyaluran_id)->paginate(10);
        return view('penyaluran.data_penduduk')->with('penduduk', $penduduk);
    }

    public function edit($id)
    {
        $bantuan    = Bantuan::all()->where('status', 'aktif');
        $kecamatan  = Kecamatan::all();
        $desa       = Desa::all();
        $penyaluran = Penyaluran::find($id);

        return view('penyaluran.edit')->with('penyaluran', $penyaluran)->with('bantuan', $bantuan)->with('kecamatan', $kecamatan)->with('desa', $desa);
    }

    public function update(PenyaluranRequest $request, $id)
    {
        $penyaluran = Penyaluran::find($id);
        $bantuan = Bantuan::find($request->bantuan_id);
        $bantuan_b = Bantuan::find($penyaluran->bantuan_id);
        $kec_long = $penyaluran->kec_long;
        $kec_lat = $penyaluran->kec_lat;
        $kel_lat = $penyaluran->kel_lat;
        $kel_long = $penyaluran->kel_long;

        if ($request->bantuan_id != $penyaluran->bantuan_id) {
            $bantuan->quota = $bantuan->quota - $request->quota;
            $bantuan->save();
            $bantuan_b->quota = $bantuan_b->quota + $penyaluran->quota;
            $bantuan_b->save();
        }

        if ($request->quota != $penyaluran->quota) {
            $b_s = $bantuan->quota;
            $b_p = $penyaluran->quota;
            $b_r = $request->quota;
            $kuota = $b_s + $b_p - $b_r;
            $bantuan->quota = $kuota;
            $bantuan->save();
        }

        if ($request->kecamatan_id != $penyaluran->kecamatan_id) {
            $kecamatan = Kecamatan::find($request->kecamatan_id);
            $desa = Desa::find($request->desa_id);
            $penyaluran_last = $penyaluran->id;
            $coordinate = "0.00{$penyaluran_last}0000";
            $kec_lat = $kecamatan->lat - $coordinate;
            $kec_long= $kecamatan->long + $coordinate;
            $kel_lat = $desa->lat - $coordinate;
            $kel_long = $desa->long + $coordinate;
        }

        if ($request->desa_id != $penyaluran->desa_id) {
            $kecamatan = Kecamatan::find($request->kecamatan_id);
            $desa = Desa::find($request->desa_id);
            $penyaluran_last = $penyaluran->id;
            $coordinate = "0.00{$penyaluran_last}0000";
            $kec_lat = $kecamatan->lat - $coordinate;
            $kec_long= $kecamatan->long + $coordinate;
            $kel_lat = $desa->lat - $coordinate;
            $kel_long = $desa->long + $coordinate;
        }

        $penyaluran->kecamatan_id = $request->kecamatan_id;
        $penyaluran->bantuan_id = $request->bantuan_id;
        $penyaluran->desa_id = $request->desa_id;
        $penyaluran->quota = $request->quota;
        $penyaluran->keterangan_kemensos = $request->keterangan_kemensos;
        $penyaluran->kec_lat = $kec_lat;
        $penyaluran->kec_long =$kec_long;
        $penyaluran->kel_lat = $kel_lat;
        $penyaluran->kel_long = $kel_long;
        $penyaluran->save();

        Session::flash("notice", "Penyaluran terpilih berhasil diupdate");
        return redirect()->route("penyaluran.index");
    }

    public function destroy($id)
    {
        $penyaluran = Penyaluran::find($id);
        $bantuan = Bantuan::find($penyaluran->bantuan_id);
        $bantuan->quota = $bantuan->quota + $penyaluran->quota;
        $bantuan->save();
        Penyaluran::destroy($id);
        Session::flash("notice", "Penyaluran Bantuan Sosial terpilih berhasil dihapus");
        return redirect()->route("penyaluran.index");
    }
}
