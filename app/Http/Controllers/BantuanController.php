<?php

namespace App\Http\Controllers;

use App\Bantuan;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Http\Requests\BantuanRequest;

class BantuanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $bantuan = Bantuan::paginate(10);
        return view('bantuan.index')->with('bantuan', $bantuan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BantuanRequest $request)
    {
        Bantuan::create($request->all());

        Session::flash("notice", "Bantuan Baru Berhasil Ditambahkan");
        return redirect()->route("bantuan.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function show(Bantuan $bantuan)
    {
        return view('bantuan.show', compact('bantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bantuan $bantuan)
    {
        return view('bantuan.edit', compact('bantuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function update(BantuanRequest $request, $id)
    {
        Bantuan::find($id)->update($request->all());

        Session::flash("notice", "Jenis Bantuan terpilih berhasil diupdate");
        return redirect()->route("bantuan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bantuan::destroy($id);
        Session::flash("notice", "Jenis Bantuan terpilih berhasil dihapus");
        return redirect()->route("bantuan.index");
    }
}
