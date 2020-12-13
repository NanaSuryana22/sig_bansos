<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Auth;
use App\User;
use DB;
use Session;
use App\Http\Requests\KecamatanRequest;
use App\Http\Requests\EditKecamatanRequest;

class DataKecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatan = Kecamatan::paginate(10);
        return view('data_kecamatan.index')->with('kecamatan', $kecamatan);
    }

    public function create()
    {
        $users = User::all();
        return view('data_kecamatan.create')->with('users', $users);
    }

    public function store(KecamatanRequest $request)
    {
        Kecamatan::create($request->all());

        Session::flash("notice", "Kecamatan Baru Berhasil Ditambahkan");
        return redirect()->route("data_kecamatan.index");
    }

    public function show(Kecamatan $kecamatan)
    {
        return view('data_kecamatan.show', compact('kecamatan'));
    }

    public function edit($id)
    {
        $users = User::all();
        $kecamatan = Kecamatan::find($id);
        return view('data_kecamatan.edit')->with('kecamatan', $kecamatan)->with('users', $users);
    }

    public function update(EditKecamatanRequest $request, $id)
    {
        Kecamatan::find($id)->update($request->all());

        Session::flash("notice", "Data Kecamatan terpilih berhasil diupdate");
        return redirect()->route("data_kecamatan.index");
    }

    public function destroy($id)
    {
        Kecamatan::destroy($id);
        Session::flash("notice", "Kecamatan terpilih berhasil dihapus");
        return redirect()->route("data_kecamatan.index");
    }
}
