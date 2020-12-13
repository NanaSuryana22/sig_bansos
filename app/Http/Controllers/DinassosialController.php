<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Role;
use Illuminate\Support\Facades\DB;

class DinassosialController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('dinas_sosial.index');
    }
}
