<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('masyarakat.index');
    }
}
