<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/resetpassword', 'UserController@forgotPasswordEmail');
Route::get('send-mail', function () {

	$details = [
		'title' => 'Mail from ItSolutionStuff.com',
		'body' => 'This is for testing email using smtp'
	];

	Mail::to('chandra.ramadhan100391@gmail.com')->send(new \App\Mail\ForgotPassword($details));

	dd("Email is Sent.");
});
Route::group(['middleware' => 'auth'], function () {
	Route::resource('karyawan', 'KaryawanController');
	Route::resource('perusahaanuser', 'KaryawanuserController');
	Route::resource('kriteria', 'KriteriaController');
	Route::resource('klasifikasi', 'KlasifikasiController');
	Route::resource('detailkriteria', 'DetailkriteriaController');
	Route::get('detailkriteria/create/{id_kriteria}', 'DetailkriteriaController@create');
	Route::get('detailkriteria/show/{id_kriteria}', 'DetailkriteriaController@show');
	Route::get('detailkriteria/detail/{id_kriteria}', 'DetailkriteriaController@detail');
	Route::get('karyawan/detail/{id}', 'KaryawanController@edit');
	Route::get('detailkriteria/edit/{id}', 'DetailkriteriaController@edit');

    Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/criteria_form/{employee_id}', [KaryawanController::class, 'criteriaForm'])->name('karyawan.criteria_form');
    Route::post('/karyawan/store_criteria', [KaryawanController::class, 'storeCriteria'])->name('karyawan.store_criteria');
    Route::get('/karyawan/detail/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
    // web.php
    Route::get('/karyawan/add_criteria/{employee_id}', [KaryawanController::class, 'addCriteria'])->name('karyawan.add_criteria');
    Route::post('/karyawan/store_criteria', [KaryawanController::class, 'storeCriteria'])->name('karyawan.store_criteria');


    Route::resource('hitung', 'HitungController');
    Route::post('/karyawan/submit', [HitungController::class, 'submit'])->name('karyawan.submit');
    Route::post('/history/detail', [HistoryController::class, 'detail'])->name('history.detail');
    // Route::post('/save-ranking', [HitungController::class, 'saveRanking'])->name('saveRanking');
    Route::post('/save-ranking', [HitungController::class, 'saveRanking'])->name('save.ranking');
	Route::resource('perhitungan', 'PerhitunganController');
	Route::resource('user', 'UserController');
    Route::resource('history', 'HistoryController');
    Route::get('/history/{id}', [HistoryController::class, 'detail'])->name('history.detail');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


});