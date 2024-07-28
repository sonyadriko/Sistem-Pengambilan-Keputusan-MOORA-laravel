<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = DB::table('kriteria')->get();
        return view('kriteria.index',compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create');
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

                DB::table('kriteria')->insert(
                    [
                        'name' => $request->name,
                        'bobot' => $request->bobot,
                        'jenis' => $request->jenis,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/kriteria')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/kriteria')->with('status_fail', 'falseinsert');
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
        $kriteria = DB::table('kriteria')->where('id',$id)->get();
        return view('kriteria.show',compact('kriteria'));
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

                DB::table('kriteria')->where('id',$id)->update(
                    [
                        'name' => $request->name,
                        'bobot' => $request->bobot,
                        'jenis' => $request->jenis,
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/kriteria')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/kriteria')->with('status_fail', 'falseinsert');
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

                DB::table('kriteria')->where('id',$id)->delete();
            });

            return redirect('/kriteria')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/kriteria')->with('status_fail', 'falseinsert');
        }
    }
}
