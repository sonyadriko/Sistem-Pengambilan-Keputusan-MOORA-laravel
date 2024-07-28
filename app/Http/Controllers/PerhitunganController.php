<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
// use Illuminate\Support\Facades\DB;
use auth;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $perhitungan = DB::table('rangking')
        //                 ->join('klasifikasi','klasifikasi.id','rangking.id_klasifikasi')
        //                 ->join('perusahaan_user','perusahaan_user.id','rangking.id_perusahaan')
        //                 // ->groupby('klasifikasi.id')
        //                 ->orderby('klasifikasi.id','asc')
        //                 ->orderby('rangking.nilai','desc')
        //                 ->get(array(
        //                     'rangking.nilai',
        //                     'klasifikasi.name as klasifikasi',
        //                     'perusahaan_user.name as perusahaan',
        //                     'perusahaan.no_anggota as no_anggota',
        //                 ));
        // dd($perhitungan);
        $klasifikasi = DB::table('klasifikasi')->orderby('id','asc')->get();
    //    dd($klasifikasi);
        // return view('perhitungan.rangking');
        return view('perhitungan.rangking',compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perhitungan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('perhitungan')->insert(
                    [
                        'name' => $request->name,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/perhitungan')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/perhitungan')->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $id_klasifikasi = $id;
        // $perhitungan = DB::table('detailklasifikasi')
        // ->join('kriteria','kriteria.id','detailklasifikasi.id_kriteria')
        // ->where('detailklasifikasi.id_klasifikasi',$id)
        // ->orderby('detailklasifikasi.nilai','asc')
        // ->get(array(
        //     'detailklasifikasi.id',
        //     'kriteria.name',
        //     'detailklasifikasi.id_klasifikasi',
        //     'detailklasifikasi.id_kriteria',
        //     'detailklasifikasi.nilai',
        // ));
        // //dd($perhitungan);
        // $count = DB::table('detailklasifikasi')
        // ->join('kriteria','kriteria.id','detailklasifikasi.id_kriteria')
        // ->where('detailklasifikasi.id_klasifikasi',$id)
        // ->orderby('detailklasifikasi.nilai','asc')
        // ->count();


        // return view('perhitungan.index',compact('perhitungan','count','id_klasifikasi'));
        return view('perhitungan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}