<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = DB::table('klasifikasi')->get();
        return view('klasifikasi.index',compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.create');
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

                DB::table('klasifikasi')->insert(
                    [
                        'name' => $request->name,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/klasifikasi')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/klasifikasi')->with('status_fail', 'falseinsert');
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
        $klasifikasi = DB::table('klasifikasi')->where('id',$id)->get();
        return view('klasifikasi.show',compact('klasifikasi'));
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
        try {
            DB::transaction(function () use ($id,$request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('klasifikasi')->where('id',$id)->update(
                    [
                        'name' => $request->name,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/klasifikasi')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/klasifikasi')->with('status_fail', 'falseinsert');
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

                DB::table('klasifikasi')->where('id',$id)->delete();
            });

            return redirect('/klasifikasi')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/klasifikasi')->with('status_fail', 'falseinsert');
        }
    }
}
