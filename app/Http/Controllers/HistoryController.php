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
    // public function detail($id)
    // {
    //     $rankingDetail = DB::table('ranking_detail')
    //         ->where('ranking_id', $id)
    //         ->get();

    //     return view('history.detail', compact('rankingDetail'));
    // }
    public function show($id)
    {
        $rankingDetail = DB::table('ranking_detail')
            ->where('ranking_id', $id)
            ->orderBy('ranking', 'ASC') // Change 'DESC' to 'ASC' to display from ranking 1 to n
            ->get();

        return view('history.detail', compact('rankingDetail'));
    }
}