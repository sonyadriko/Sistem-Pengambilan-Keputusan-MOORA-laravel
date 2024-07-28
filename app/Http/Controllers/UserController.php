<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->get();
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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

                DB::table('users')->insert(
                    [
                        'name' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'type_user' => $request->akses,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            return redirect('/user')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/user')->with('status_fail', 'falseinsert');
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
        $perusahaanuser = DB::table('perusahaan_user')->where('id_user',$id)->get();
        return view('perusahaanuser.index',compact('perusahaanuser'));
    }

   

    public function forgotPasswordEmail(Request $request)
    {
        
        try {
            DB::transaction(function () use ($request) {
                 $user = DB::table('users')->where('email',$request->email)->get();
               dd($user);
            });
            return redirect('/user')->with('status', 'trueinsert');
        } catch (Exception $e) {
             return redirect('/user')->with('status_fail', 'falseinsert');
        }
      
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
