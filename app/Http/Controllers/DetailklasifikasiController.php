<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class DetailklasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailklasifikasi = DB::table('detailklasifikasi ds')
        ->join('kriteria k','k.id','ds.id_kriteria')
        ->where()
        ->groupby()
        ->orderby()
        ->get(array(
            'ds.*',
            'k.name'
        ));
        dd($detailklasifikasi);
        return view('detailklasifikasi.index',compact('detailklasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $klasifikasi = DB::table('klasifikasi')->where('id',$id)->first();
       // dd($id);
        // $kriteria = DB::table('kriteria')->get();
        $kriteria = DB::select('select id,name from kriteria 
                                    where id not in (
                                            select id_kriteria 
                                            from detailklasifikasi 
                                            where id_klasifikasi = ? )',[$id]);
        return view('detailklasifikasi.create',compact('klasifikasi','kriteria'));
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

                DB::table('detailklasifikasi')->insert(
                    [
                        'id_klasifikasi' => $request->id_klasifikasi,
                        'id_kriteria' => $request->id_kriteria,
                        'nilai' => $request->nilai,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $detailklasifikasi = DB::table('detailklasifikasi')
        ->join('kriteria','kriteria.id','detailklasifikasi.id_kriteria')
        ->where('detailklasifikasi.id_klasifikasi',$id)
        ->get(array(
            'detailklasifikasi.*',
            'kriteria.name as name_kriteria'
        ));
        //dd($detailklasifikasi);
        return view('detailklasifikasi.index',compact('detailklasifikasi','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailklasifikasi = DB::table('detailklasifikasi')
        ->where('detailklasifikasi.id',$id)
        ->get();
        $klasifikasi = DB::table('klasifikasi')->where('id',$detailklasifikasi[0]->id_klasifikasi)->first();
        $kriteria = DB::select('select id,name from kriteria');
        //  dd( $detailklasifikasi);
        return view('detailklasifikasi.show',compact('detailklasifikasi','klasifikasi','kriteria'));
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
        try {
            DB::transaction(function () use ($id,$request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('detailklasifikasi')->where('id',$id)->update(
                    [
                        'nilai' => $request->nilai,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        try {
            DB::transaction(function () use ($id,$request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('detailklasifikasi')->where('id',$id)->delete();
            });

            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailklasifikasi/'.$request->id_klasifikasi)->with('status_fail', 'falseinsert');
        }
    }
}
