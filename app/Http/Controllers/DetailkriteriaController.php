<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class DetailkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = DB::table('kriteria')->get();
        return view('detailkriteria.index',compact('kriteria'));
    }

    public function detail($id_kriteria)
    {
        $detailkriteria = DB::table('detailkriteria')
        ->join('kriteria','kriteria.id','detailkriteria.id_kriteria')
        ->join('karyawan','karyawan.id','detailkriteria.id_karyawan')
        ->where('detailkriteria.id_kriteria',$id_kriteria)
        ->get(array(
            'detailkriteria.*',
            'kriteria.name',
            'karyawan.name as nama_karyawan'
        ));
        // //dd($detailkriteria);
        return view('detailkriteria.detail',compact('detailkriteria','id_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_kriteria)
    {
        $kriteria = DB::table('kriteria')->where('id',$id_kriteria)->first();
       // dd($id);
        $perusahaan = DB::select('select id,name from karyawan 
                                    where id not in (
                                            select id_karyawan 
                                            from detailkriteria 
                                            where id_kriteria = ?)',[$id_kriteria]);
                                           // dd($perusahaan);
        return view('detailkriteria.create',compact('kriteria','perusahaan'));
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

                DB::table('detailkriteria')->insert(
                    [
                        'id_kriteria' => $request->id_kriteria,
                        'id_karyawan' => $request->id_karyawan,
                        'nilai' => $request->nilai,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kriteria)
    {
        
        $kriteria = DB::table('kriteria')->where('id',$id_kriteria)->first();
        //
        $detailkriteria = DB::table('detailkriteria')
        ->join('kriteria','kriteria.id','detailkriteria.id_kriteria')
        ->join('karyawan','karyawan.id','detailkriteria.id_karyawan')
        ->where('detailkriteria.id_kriteria',$id_kriteria)
        ->get(array(
            'detailkriteria.*',
            'kriteria.name',
            'karyawan.name as nama_karyawan'
        ));
        
        return view('detailkriteria.detail',compact('kriteria','detailkriteria','id_kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailkriteria = DB::table('detailkriteria')
        ->where('detailkriteria.id',$id)
        ->get();
        $klasifikasi = DB::table('klasifikasi')->where('id',$detailkriteria[0]->id_klasifikasi)->first();
        $kriteria = DB::table('kriteria')->where('id',$detailkriteria[0]->id_kriteria)->first();
        $perusahaan = DB::select('select id,name from perusahaan');
                                           // dd($perusahaan);
        return view('detailkriteria.show',compact('detailkriteria','klasifikasi','kriteria','perusahaan'));
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

                DB::table('detailkriteria')->where('id',$id)->update(
                    [
                       
                        'nilai' => $request->nilai,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            DB::transaction(function () use ($id,$request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('detailkriteria')->where('id',$id)->delete();
            });

            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/detailkriteria/show/'.$request->id_kriteria)->with('status_fail', 'falseinsert');
        }
    }
}
