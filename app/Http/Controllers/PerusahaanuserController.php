<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class PerusahaanuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaanuser = DB::table('perusahaan_user')->where('id_user',auth()->user()->id)->get();
        return view('perusahaanuser.index',compact('perusahaanuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaanuser.create');
    }

    public function rekomendasi($id)
    {
        $perusahaanuser = DB::table('perusahaan_user')->where('id',$id)->get();

        $klasifikasiname='';
        if(($perusahaanuser[0]->potensi == '5-10 Lt/Dtk' || $perusahaanuser[0]->potensi == '>10 Lt/Dtk') && $perusahaanuser[0]->kebutuhan == 'Kebutuhan Operasional'){
            $klasifikasiname = 'Lokasi Debit Air Tinggi Dengan Kebutuhan Rendah';
        }elseif((($perusahaanuser[0]->potensi == '5-10 Lt/Dtk' || $perusahaanuser[0]->potensi == '>10 Lt/Dtk') && $perusahaanuser[0]->kebutuhan == 'Kebutuhan Produksi')){
            $klasifikasiname = 'Lokasi Debit Air Tinggi Dengan Kebutuhan Tinggi';
        }elseif((($perusahaanuser[0]->potensi == 'Langka' || $perusahaanuser[0]->potensi == '<5 Lt/Dtk') && $perusahaanuser[0]->kebutuhan == 'Kebutuhan Operasional')){
            $klasifikasiname = 'Lokasi Debit Air Rendah Dengan Kebutuhan Rendah';
        }elseif((($perusahaanuser[0]->potensi == 'Langka' || $perusahaanuser[0]->potensi == '<5 Lt/Dtk') && $perusahaanuser[0]->kebutuhan == 'Kebutuhan Produksi')){
            $klasifikasiname = 'Lokasi Debit Air Rendah Dengan Kebutuhan Tinggi';
        }

        $klasifikasi = DB::table('klasifikasi')->where('name','like',$klasifikasiname)->orderby('id','asc')->get();
        
        //dd($klasifikasi);
        return view('perusahaanuser.rangking',compact('klasifikasi'));
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

                DB::table('perusahaan_user')->insert(
                    [
                        'name' => $request->name,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'telpon' => $request->telpon,
                        'potensi' => $request->potensi,
                        'kebutuhan' => $request->kebutuhan,
                        'id_user' => auth()->user()->id,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/perusahaanuser')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/perusahaanuser')->with('status_fail', 'falseinsert');
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
        $perusahaanuser = DB::table('perusahaan_user')->where('id',$id)->get();
        return view('perusahaanuser.show',compact('perusahaanuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaanuser = DB::table('perusahaan_user')->where('id',$id)->get();
        return view('perusahaanuser.detail',compact('perusahaanuser'));
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
        // dd($request);
        try {
            DB::transaction(function () use ($id,$request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('perusahaan_user')->where('id',$id)->update(
                    [
                        'name' => $request->name,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'telpon' => $request->telpon,
                        'potensi' => $request->potensi,
                        'kebutuhan' => $request->kebutuhan,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/perusahaanuser')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/perusahaanuser')->with('status_fail', 'falseinsert');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                // upload image
                // print_r($request->all()); die();

                DB::table('perusahaan_user')->where('id',$id)->delete();
            });

            return redirect('/perusahaanuser')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/perusahaanuser')->with('status_fail', 'falseinsert');
        }
    }
}
