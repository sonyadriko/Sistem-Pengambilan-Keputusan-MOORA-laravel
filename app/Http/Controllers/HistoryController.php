<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HistoryController extends Controller
{
    public function index()
    {
        $history = DB::table('ranking')->get();
        // dd($karyawan);
        return view('history.index',compact('history'));
    }
}
