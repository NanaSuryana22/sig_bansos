<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenggunaRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use Auth;
use DB;

class PenggunaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:dinas_sosial');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['dinas_sosial']);

        $users = User::paginate(10);
        return view('pengguna.index')->with('users', $users);
    }

    public function create()
    {
        $role = DB::table('roles')->select('id', 'name')->get();
        return view('pengguna.create')->with('role', $role);
    }

    public function store(PenggunaRequest $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $role_user = Role::where('name', $request->role_name)->first();
        $user->roles()->attach($role_user);

        Session::flash("notice", "Pengguna berhasil ditambahkan");
        return redirect()->route("pengguna.index");
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::find($user->id);
        return view('pengguna.show')->with('user', $user)->with('role', $role);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = DB::table('roles')->select('id', 'name')->get();
        return view('pengguna.edit')->with('user', $user)->with('role', $role); 
    }

    public function update(Request $request, $id)
    {
        $role_user = DB::table('role_user')->where('user_id', $id)->update(['role_id' => $request->role_id]);

        User::find($id)->update($request->all());
        Session::flash("notice", "Pengguna terpilih berhasil diubah");
        return redirect()->route("pengguna.index");
    }

    public function destroy($id)
    {
        User::destroy($id);
        Session::flash("notice", "Pengguna terpilih berhasil dihapus");
        return redirect()->route("pengguna.index");
    }
}
