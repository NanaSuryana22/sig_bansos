<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Auth;
use App\User;
use App\Desa;
use DB;
use Session;
use App\Http\Requests\DesaRequest;
use App\Http\Requests\EditDesaRequest;

class DataDesaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::paginate(10);
        return view('data_desa.index')->with('desa', $desa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $kecamatan = Kecamatan::all();
        return view('data_desa.create')->with('users', $users)->with('kecamatan', $kecamatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesaRequest $request)
    {
        Desa::create($request->all());

        Session::flash("notice", "Desa Baru Berhasil Ditambahkan");
        return redirect()->route("data_desa.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desa = Desa::find($id);
        return view('data_desa.show')->with('desa', $desa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::find($id);
        return view('data_desa.edit')->with('desa', $desa)->with('kecamatan', $kecamatan)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDesaRequest $request, $id)
    {
        Desa::find($id)->update($request->all());

        Session::flash("notice", "Data Desa terpilih berhasil diupdate");
        return redirect()->route("data_desa.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Desa::destroy($id);
        Session::flash("notice", "Desa terpilih berhasil dihapus");
        return redirect()->route("data_desa.index");
    }
}
