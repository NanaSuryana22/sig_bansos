<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use Auth;
use DB;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:dinas_sosial');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['dinas_sosial']);

        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->roles()->attach(Role::where('name', $request->role_name)->first());
        $user->save();

        Session::flash("notice", "Pengguna berhasil ditambahkan");
        return redirect()->route("users.index");
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::find($user->id);
        return view('users.show')->with('user', $user)->with('role', $role);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = DB::table('roles')->select('id', 'name')->get();
        return view('users.edit')->with('user', $user)->with('role', $role); 
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        Session::flash("notice", "Pengguna terpilih berhasil diubah");
        return redirect()->route("users.show", $id);
    }

    public function destroy($id)
    {
        User::destroy($id);
        Session::flash("notice", "Pengguna terpilih berhasil dihapus");
        return redirect()->route("user.index");
    }
}
