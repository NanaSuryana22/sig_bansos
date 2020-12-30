<?php

namespace App\Http\Controllers;

use App\Bantuan;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Http\Requests\BantuanRequest;
use App\Http\Requests\EditBantuanRequest;

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
        $bantuan = Bantuan::orderBy('created_at', 'desc')->paginate(10);
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
        $image = $request->file('image');
        $dp_image = 'photo/';
        $image_name = str_random(6).'_'.$image->getClientOriginalName();
        $image->move($dp_image, $image_name);

        $bantuan = new Bantuan;
        $bantuan->nama_bantuan = $request->nama_bantuan;
        $bantuan->image = $dp_image . $image_name;
        $bantuan->quota = $request->quota;
        $bantuan->bantuan_berupa = $request->bantuan_berupa;
        $bantuan->tanggal_dikeluarkan = $request->tanggal_dikeluarkan;
        $bantuan->status = $request->status;
        $bantuan->save();

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
    public function update(EditBantuanRequest $request, $id)
    {
        $b = Bantuan::find($id);
        if (empty($request->file('image'))) {
            $image_n = $b->image;
        }
        else {
            $image = $request->file('image');
            $dp_image = 'photo/';
            $image_name = str_random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
            $image_n = $dp_image . $image_name;
        }

        $b->nama_bantuan = $request->nama_bantuan;
        $b->image = $image_n;
        $b->quota = $request->quota;
        $b->bantuan_berupa = $request->bantuan_berupa;
        $b->tanggal_dikeluarkan = $request->tanggal_dikeluarkan;
        $b->status = $request->status;
        $b->save();

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
