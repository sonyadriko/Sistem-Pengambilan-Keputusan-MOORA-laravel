<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
    public function index()
    {
        $karyawan = DB::table('karyawan')->get();
        $totalBobot = DB::table('kriteria')->sum('bobot'); // Adjust this based on your actual table and column names
        $isValidBobot = $totalBobot == 100;

        return view('hitung.index', compact('karyawan', 'isValidBobot'));
    }
    public function submit(Request $request)
    {
        // Ambil ID karyawan yang dipilih dari input hidden
        $selectedKaryawanIds = explode(',', $request->input('selected_karyawan'));

        \Log::info('Data received: ', $request->all());

        // Lakukan query menggunakan Query Builder untuk mengambil karyawan dan nilai kriteria mereka
        $selectedKaryawan = DB::table('karyawan')
            ->join('detailkriteria', 'karyawan.id', 'detailkriteria.id_karyawan')
            ->join('kriteria', 'detailkriteria.id_kriteria', 'kriteria.id')
            ->whereIn('karyawan.id', $selectedKaryawanIds)
            ->select('karyawan.name', 'karyawan.alamat', 'karyawan.email', 'karyawan.telpon',
                     DB::raw('MAX(CASE WHEN kriteria.name = "Jenjang Pendidikan" THEN detailkriteria.nilai ELSE NULL END) as jenjang_pendidikan'),
                     DB::raw('MAX(CASE WHEN kriteria.name = "Pengalaman" THEN detailkriteria.nilai ELSE NULL END) as pengalaman'),
                     DB::raw('MAX(CASE WHEN kriteria.name = "Absensi" THEN detailkriteria.nilai ELSE NULL END) as absensi'),
                     DB::raw('MAX(CASE WHEN kriteria.name = "Loyalitas" THEN detailkriteria.nilai ELSE NULL END) as loyalitas'),
                     DB::raw('MAX(CASE WHEN kriteria.name = "Wawancara" THEN detailkriteria.nilai ELSE NULL END) as wawancara'))
            ->groupBy('karyawan.id', 'karyawan.name', 'karyawan.alamat', 'karyawan.email', 'karyawan.telpon')
            ->get();

        // Hitung nilai K
        $k1 = sqrt($selectedKaryawan->sum(function($row) { return pow($row->jenjang_pendidikan, 2); }));
        $k2 = sqrt($selectedKaryawan->sum(function($row) { return pow($row->pengalaman, 2); }));
        $k3 = sqrt($selectedKaryawan->sum(function($row) { return pow($row->absensi, 2); }));
        $k4 = sqrt($selectedKaryawan->sum(function($row) { return pow($row->loyalitas, 2); }));
        $k5 = sqrt($selectedKaryawan->sum(function($row) { return pow($row->wawancara, 2); }));

        // Hitung normalisasi
        $normalisasi = [];
        foreach ($selectedKaryawan as $karyawan) {
            $normalisasi[] = [
                'name' => $karyawan->name,
                'jenjang_pendidikan' => $karyawan->jenjang_pendidikan / $k1,
                'pengalaman' => $karyawan->pengalaman / $k2,
                'absensi' => $karyawan->absensi / $k3,
                'loyalitas' => $karyawan->loyalitas / $k4,
                'wawancara' => $karyawan->wawancara / $k5,
            ];
        }

        // Ambil bobot dari tabel kriteria
        $bobot = DB::table('kriteria')->pluck('bobot', 'name')->toArray();
        $tipe = DB::table('kriteria')->pluck('jenis', 'name')->toArray();

          // Hitung normalisasi
        $optimasi = [];
        foreach ($selectedKaryawan as $karyawan) {
            $jenjang_pendidikan = $karyawan->jenjang_pendidikan / $k1 * ($bobot['Jenjang Pendidikan'] / 100);
            $pengalaman = $karyawan->pengalaman / $k2 * ($bobot['Pengalaman'] / 100);
            $absensi = $karyawan->absensi / $k3 * ($bobot['Absensi'] / 100);
            $loyalitas = $karyawan->loyalitas / $k4 * ($bobot['Loyalitas'] / 100);
            $wawancara = $karyawan->wawancara / $k5 * ($bobot['Wawancara'] / 100);

            if ($tipe['Jenjang Pendidikan'] == 'cost') {
                $jenjang_pendidikan = -$jenjang_pendidikan;
            }
            if ($tipe['Pengalaman'] == 'cost') {
                $pengalaman = -$pengalaman;
            }
            if ($tipe['Absensi'] == 'cost') {
                $absensi = -$absensi;
            }
            if ($tipe['Loyalitas'] == 'cost') {
                $loyalitas = -$loyalitas;
            }
            if ($tipe['Wawancara'] == 'cost') {
                $wawancara = -$wawancara;
            }

            $total_optimasi = $jenjang_pendidikan + $pengalaman + $absensi + $loyalitas + $wawancara;

            $optimasi[] = [
                'name' => $karyawan->name,
                'jenjang_pendidikan' => $jenjang_pendidikan,
                'pengalaman' => $pengalaman,
                'absensi' => $absensi,
                'loyalitas' => $loyalitas,
                'wawancara' => $wawancara,
                'total_optimasi' => $total_optimasi,
            ];
        }
        \Log::info('Optimasi hasil: ', $optimasi);

        usort($optimasi, function($a, $b) {
            return $b['total_optimasi'] <=> $a['total_optimasi'];
        });

        return view('hitung.selected', [
            'karyawan' => $selectedKaryawan,
            'normalisasi' => $normalisasi,
            'optimasi' => $optimasi,
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5
        ]);
    }
    // public function saveRanking(Request $request)
    // {
    //     $rankingData = $request->input('rankingData');

    //     foreach ($rankingData as $data) {
    //         DB::table('ranking')->insert([
    //             'name' => $data['name'],
    //             'total_optimasi' => $data['total_optimasi'],
    //             'ranking' => $data['ranking']
    //         ]);
    //     }

    //     return redirect()->route('karyawan.index')->with('success', 'Data ranking berhasil disimpan.');
    // }

    public function saveRanking(Request $request)
    {
        $rankings = json_decode($request->input('rankings'), true);

        // Buat entri di tabel rankings
        $rankingId = DB::table('ranking')->insertGetId([
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat entri di tabel ranking_details
        foreach ($rankings  as $index => $ranking) {
            DB::table('ranking_detail')->insert([
                'ranking_id' => $rankingId,
                'name' => $ranking['name'],
                'total_optimasi' => $ranking['total_optimasi'],
                'ranking' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('home')->with('success', 'Ranking data saved successfully.');
    }

}