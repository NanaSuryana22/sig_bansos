<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $penyaluran = Penyaluran::paginate(10);
        return view('penyaluran.index')->with('penyaluran', $penyaluran);
    }

    public function create()
    {
        $bantuan   = Bantuan::all();
        $kecamatan = Kecamatan::all();
        $desa      = Desa::all();
        return view('penyaluran.create')->with('bantuan', $bantuan)->with('kecamatan', $kecamatan)->with('desa', $desa);
    }

    public function store(PenyaluranRequest $request)
    {
        Penyaluran::create($request->all());

        Session::flash("notice", "Penyaluran Bantuan Sosial Baru Berhasil Ditambahkan");
        return redirect()->route("penyaluran.index");
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::find($id);
        return view('penyaluran.show')->with('penyaluran', $penyaluran);
    }

    public function edit($id)
    {
        $bantuan    = Bantuan::all();
        $kecamatan  = Kecamatan::all();
        $desa       = Desa::all();
        $penyaluran = Penyaluran::find($id);

        return view('penyaluran.edit')->with('penyaluran', $penyaluran)->with('bantuan', $bantuan)->with('kecamatan', $kecamatan)->with('desa', $desa);
    }

    public function update(PenyaluranRequest $request, $id)
    {
        Penyaluran::find($id)->update($request->all());

        Session::flash("notice", "Penyaluran terpilih berhasil diupdate");
        return redirect()->route("penyaluran.index");
    }

    public function destroy($id)
    {
        Penyaluran::destroy($id);
        Session::flash("notice", "Penyaluran Bantuan Sosial terpilih berhasil dihapus");
        return redirect()->route("penyaluran.index");
    }
}
