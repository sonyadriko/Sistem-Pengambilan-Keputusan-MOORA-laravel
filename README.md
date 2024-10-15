# Sistem Pendukung Keputusan Pengangkatan Karyawan Kontrak Menjadi Karyawan Tetap

## Deskripsi Proyek
Proyek **Sistem Pendukung Keputusan Pengangkatan Karyawan Kontrak Menjadi Karyawan Tetap** dirancang untuk membantu perusahaan dalam proses evaluasi dan pemilihan karyawan kontrak yang memenuhi syarat untuk diangkat menjadi karyawan tetap. Sistem ini menggunakan metode **MOORA (Multi-Objective Optimization by Ratio Analysis)** untuk menentukan peringkat karyawan berdasarkan berbagai kriteria yang telah ditentukan.

## Fitur Utama
- **Manajemen Karyawan**: Administrator dapat mengelola data karyawan kontrak, termasuk informasi seperti kinerja, masa kerja, dan penilaian dari supervisor.
- **Kriteria Evaluasi**: Sistem mendukung penilaian berdasarkan kriteria *cost* dan *benefit*, yang bisa disesuaikan oleh pengguna sesuai kebutuhan perusahaan.
- **Perhitungan MOORA**: Sistem menggunakan metode MOORA untuk menghitung peringkat karyawan secara otomatis berdasarkan bobot dan nilai dari setiap kriteria.
- **Autentikasi dan Otorisasi**: Sistem dilengkapi dengan fitur autentikasi yang membedakan peran pengguna (misalnya, administrator, manajer HRD) untuk menjaga keamanan data.
- **Laporan Hasil Evaluasi**: Sistem menghasilkan laporan berupa peringkat karyawan yang disertai dengan rekomendasi untuk pengangkatan karyawan tetap.

## Tech Stack
- **Framework Backend**: Laravel (PHP)
- **Frontend**: Blade Templating (Laravel), HTML, CSS, JavaScript, Bootstrap
- **Database**: MySQL
- **Metode Penilaian**: MOORA (Multi-Objective Optimization by Ratio Analysis)
- **Autentikasi**: Fitur bawaan Laravel untuk otentikasi pengguna

## Tampilan Website
- **Halaman Login**  
  ![Halaman Login](https://github.com/user-attachments/assets/b5f181b6-3621-4984-9678-aec765a3d8c4)

- **Halaman Proses MOORA**  
  ![Halaman Proses MOORA](https://github.com/user-attachments/assets/5059e12f-03b7-4d52-8c75-193023a486d0)
