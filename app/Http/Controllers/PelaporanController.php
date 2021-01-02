<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditLaporanRequest;
use App\Http\Requests\PelaporanRequest;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\User;
use App\Desa;
use App\Kecamatan;
use App\Pelaporan;

class PelaporanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $pelaporan = Pelaporan::orderBy('created_at','DESC')->paginate(10);
        return view('pelaporan.index')->with('pelaporan', $pelaporan);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('pelaporan.create')->with('kecamatan', $kecamatan);
    }

    public function store(PelaporanRequest $request)
    {
        if ($request->hasFile('image_1')) {
            $image_1 = $request->file('image_1');
            $dp_image_1 = 'photo_pelaporan/';
            $image_1_name = str_random(6).'_'.$image_1->getClientOriginalName();
            $image_1->move($dp_image_1, $image_1_name);
        }

        if ($request->hasFile('image_2')) {
            $image_2 = $request->file('image_2');
            $dp_image_2 = 'photo_pelaporan/';
            $image_2_name = str_random(6).'_'.$image_2->getClientOriginalName();
            $image_2->move($dp_image_2, $image_2_name);
        }

        if ($request->hasFile('image_3')) {
            $image_3 = $request->file('image_3');
            $dp_image_3 = 'photo_pelaporan/';
            $image_3_name = str_random(6).'_'.$image_3->getClientOriginalName();
            $image_3->move($dp_image_3, $image_3_name);
        }

        $pelaporan = new Pelaporan;
        $pelaporan->user_id = Auth::user()->id;
        $pelaporan->judul_laporan = $request->judul_laporan;
        $pelaporan->kecamatan_id = $request->kecamatan_id;
        $pelaporan->desa_id = $request->desa_id;
        $pelaporan->alamat = $request->alamat;
        $pelaporan->phone_number = $request->phone_number;
        $pelaporan->long = $request->long;
        $pelaporan->lat = $request->lat;
        if ($request->hasFile('image_1')) {
            $pelaporan->image_1 = $dp_image_1 . $image_1_name;
        }
        if ($request->hasFile('image_2')) {
            $pelaporan->image_2 = $dp_image_2 . $image_2_name;
        }
        if ($request->hasFile('image_3')) {
            $pelaporan->image_3 = $dp_image_3 . $image_3_name;
        }
        $pelaporan->desciption = $request->desciption;
        $pelaporan->status_desa = 'Dalam Proses Verifikasi';
        $pelaporan->save();

        Session::flash("notice", "Laporan anda berhasil disimpan.");
        return redirect()->route("pelaporan.show", $pelaporan->id);
    }

    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('pelaporan.show')->with('pelaporan', $pelaporan);
    }

    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $kecamatan = Kecamatan::all();
        return view('pelaporan.edit')->with('pelaporan', $pelaporan)->with('kecamatan', $kecamatan);
    }

    public function update(EditLaporanRequest $request, $id)
    {
        $pelaporan = Pelaporan::find($id);
        if (empty($request->file('image_1'))) {
            $image_1_n = $pelaporan->image_1;
        }
        else {
            $image_1 = $request->file('image_1');
            $dp_image_1 = 'photo_pelaporan/';
            $image_1_name = str_random(6).'_'.$image_1->getClientOriginalName();
            $image_1->move($dp_image_1, $image_1_name);
            $image_1_n = $dp_image_1 . $image_1_name;
        }
        if (empty($request->file('image_2'))) {
            $image_2_n = $pelaporan->image_2;
        }
        else {
            $image_2 = $request->file('image_2');
            $dp_image_2 = 'photo_pelaporan/';
            $image_2_name = str_random(6).'_'.$image_2->getClientOriginalName();
            $image_2->move($dp_image_2, $image_2_name);
            $image_2_n = $dp_image_2 . $image_2_name;
        }
        if (empty($request->file('image_3'))) {
            $image_3_n = $pelaporan->image_3;
        }
        else {
            $image_3 = $request->file('image_3');
            $dp_image_3 = 'photo_pelaporan/';
            $image_3_name = str_random(6).'_'.$image_3->getClientOriginalName();
            $image_3->move($dp_image_3, $image_3_name);
            $image_3_n = $dp_image_3 . $image_3_name;
        }

        $pelaporan->user_id = Auth::user()->id;
        $pelaporan->judul_laporan = $request->judul_laporan;
        $pelaporan->kecamatan_id = $request->kecamatan_id;
        $pelaporan->desa_id = $request->desa_id;
        $pelaporan->alamat = $request->alamat;
        $pelaporan->phone_number = $request->phone_number;
        $pelaporan->long = $request->long;
        $pelaporan->lat = $request->lat;
        $pelaporan->image_1 = $image_1_n;
        $pelaporan->image_2 = $image_2_n;
        $pelaporan->image_3 = $image_3_n;
        $pelaporan->desciption = $request->desciption;
        $pelaporan->save();

        Session::flash("notice", "Laporan anda berhasil diubah.");
        return redirect()->route("pelaporan.show", $pelaporan->id);
    }

    public function destroy($id)
    {
        Pelaporan::destroy($id);
        Session::flash("notice", "Laporan anda berhasil dihapus");
        return redirect()->route("pelaporan.index");
    }
}
