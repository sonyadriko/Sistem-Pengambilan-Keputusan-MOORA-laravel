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
            $employeeId = null;

            DB::transaction(function () use ($request, &$employeeId) {
                // Insert new employee
                $employeeId = DB::table('karyawan')->insertGetId(
                    [
                        'name' => $request->name,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'telpon' => $request->telpon,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
            });

            // return redirect()->route('karyawan.create_kriteria', ['employee_id' => $employeeId])->with('employee_id', $employeeId);
            return redirect('/karyawan')->with('status_sukses', 'Berhasil menambah karyawan');
        } catch (Exception $e) {
            return redirect('/karyawan')->with('status_fail', 'Failed to add employee');
        }
    }

    public function criteriaForm($employee_id)
    {
        $karyawan = DB::table('karyawan')->where('id', $employee_id)->first();
        return view('karyawan.create_kriteria', compact('karyawan','employee_id'));
    }


    public function addCriteria($employee_id)
    {
        // Pass the employee_id to the view
        $karyawan = DB::table('karyawan')->where('id', $employee_id)->first();
        return view('karyawan.add_criteria', compact('karyawan','employee_id'));
    }

    public function storeCriteria(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer',
            'jenjang_pendidikan' => 'nullable|integer',
            'pengalaman' => 'nullable|integer',
            'absensi' => 'nullable|integer',
            'loyalitas' => 'nullable|integer',
            'wawancara' => 'nullable|integer',
        ]);

        $criteria = [
            ['id_karyawan' => $request->employee_id, 'id_kriteria' => 9, 'nilai' => $request->jenjang_pendidikan],
            ['id_karyawan' => $request->employee_id, 'id_kriteria' => 10, 'nilai' => $request->pengalaman],
            ['id_karyawan' => $request->employee_id, 'id_kriteria' => 11, 'nilai' => $request->absensi],
            ['id_karyawan' => $request->employee_id, 'id_kriteria' => 12, 'nilai' => $request->loyalitas],
            ['id_karyawan' => $request->employee_id, 'id_kriteria' => 13, 'nilai' => $request->wawancara],
        ];

        DB::table('detailkriteria')->insert($criteria);

        return redirect()->route('karyawan.show', $request->employee_id)
                        ->with('status', 'Criteria added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $karyawan = DB::table('karyawan')->where('id',$id)->get();
    //     return view('karyawan.show',compact('karyawan'));
    // }
    public function show($id)
    {
        $employee = DB::table('karyawan')->where('id', $id)->first();
        $karyawan = DB::table('karyawan')->where('id',$id)->first();
        $criteria = DB::table('detailkriteria')
            ->join('kriteria', 'detailkriteria.id_kriteria', '=', 'kriteria.id')
            ->where('detailkriteria.id_karyawan', $id)
            ->select('kriteria.name', 'detailkriteria.nilai')
            ->get();

        return view('karyawan.show', compact('employee', 'criteria', 'karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = DB::table('karyawan')->where('id',$id)->first();
        return view('karyawan.edit', compact('karyawan'));
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
    public function editCriteria($id)
    {
        $karyawan = DB::table('karyawan')->where('id',$id)->first();
        $criteria = DB::table('detailkriteria')
                      ->where('id_karyawan', $id)
                      ->get()
                      ->keyBy('id_kriteria');

        return view('karyawan.edit_criteria', compact('karyawan', 'criteria'));
    }


    // Method for updating criteria
    public function updateCriteria(Request $request, $id)
    {
        $request->validate([
            'jenjang_pendidikan' => 'nullable|integer',
            'pengalaman' => 'nullable|integer',
            'absensi' => 'nullable|integer',
            'loyalitas' => 'nullable|integer',
            'wawancara' => 'nullable|integer',
        ]);

        $criteria = [
            ['id_karyawan' => $id, 'id_kriteria' => 9, 'nilai' => $request->jenjang_pendidikan],
            ['id_karyawan' => $id, 'id_kriteria' => 10, 'nilai' => $request->pengalaman],
            ['id_karyawan' => $id, 'id_kriteria' => 11, 'nilai' => $request->absensi],
            ['id_karyawan' => $id, 'id_kriteria' => 12, 'nilai' => $request->loyalitas],
            ['id_karyawan' => $id, 'id_kriteria' => 13, 'nilai' => $request->wawancara],
        ];

        foreach ($criteria as $criterion) {
            DB::table('detailkriteria')
                ->updateOrInsert(
                    ['id_karyawan' => $criterion['id_karyawan'], 'id_kriteria' => $criterion['id_kriteria']],
                    ['nilai' => $criterion['nilai']]
                );
        }

        return redirect()->route('karyawan.show', $id)
                        ->with('status', 'Criteria updated successfully');
    }

}