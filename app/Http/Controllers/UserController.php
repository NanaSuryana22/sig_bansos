<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Role;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $users = User::all();
        return view('users.index')->with('users', $users);
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
        return view('users.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user); 
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
