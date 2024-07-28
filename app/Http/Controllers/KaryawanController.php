<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;
use auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = DB::table('karyawan')->get();
        // dd($karyawan);
        return view('karyawan.index',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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

                DB::table('karyawan')->insert(
                    [
                        // 'id_karyawan' => $request->id_karyawan,
                        // 'no_anggota' => $request->no_anggota,
                        'name' => $request->name,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'telpon' => $request->telpon,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/karyawan')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/karyawan')->with('status_fail', 'falseinsert');
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
        $karyawan = DB::table('karyawan')->where('id',$id)->get();
        return view('karyawan.show',compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = DB::table('karyawan')->where('id',$id)->get();
        return view('karyawan.detail',compact('karyawan'));
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

                DB::table('karyawan')->where('id',$id)->update(
                    [
                        // 'id_karyawan' => $request->id_karyawan,
                        // 'no_anggota' => $request->no_anggota,
                        'name' => $request->name,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'telpon' => $request->telpon,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/karyawan')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/karyawan')->with('status_fail', 'falseinsert');
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

                DB::table('karyawan')->where('id',$id)->delete();
            });

            return redirect('/karyawan')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/karyawan')->with('status_fail', 'falseinsert');
        }
    }
}
