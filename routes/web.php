<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\CommodityLocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolOperationalAssistanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/barang', [CommodityController::class, 'index'])->name('barang.index');
    Route::post('/barang', [CommodityController::class, 'store'])->name('barang.store');
    Route::put('/barang/{commodity}', [CommodityController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{commodity}', [CommodityController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/print', [CommodityController::class, 'generatePDF'])->name('barang.print');
    Route::get('/barang/export', [CommodityController::class, 'export'])->name('barang.export');
    Route::get('/barang/import', [CommodityController::class, 'export'])->name('barang.import');

    Route::get('/bantuan-dana-operasional', [SchoolOperationalAssistanceController::class, 'index'])
        ->name('bantuan-dana-operasional.index');
    Route::post('/bantuan-dana-operasional', [SchoolOperationalAssistanceController::class, 'store'])
        ->name('bantuan-dana-operasional.store');

    Route::get('/ruangan', [CommodityLocationController::class, 'index'])->name('ruangan.index');
    Route::post('/ruangan', [CommodityLocationController::class, 'store'])->name('ruangan.store');
});

// Route::group(['prefix' => 'excel', 'as' => 'excel.barang.', 'middleware' => 'auth'], function () {
//     Route::group(['prefix' => 'barang'], function () {
//         Route::get('/export', 'Commodities\CommodityExportImportController@export')->name('export');
//         Route::post('/import', 'Commodities\CommodityExportImportController@import')->name('import');
//     });
// });

// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//     Route::group(['prefix' => 'barang', 'as' => 'barang.'], function () {
//         Route::get('/print', 'Commodities\PdfController@generatePdf')->name('print');
//         Route::get('/print/{id}', "Commodities\PdfController@generatePdfOne")->name('print.one');
//     });

//     Route::get('/dashboard', 'HomeController@index')->name('home');
//     Route::resource('/barang', 'Commodities\CommodityController');
//     Route::resource('/bantuan-dana-operasional', 'SchoolOperationalAssistances\SchoolOperationalAssistance');
//     Route::resource('/ruang', 'CommodityLocations\CommodityLocationController');

//     Route::resource('/commodities/json', 'Commodities\Ajax\CommodityAjaxController');
//     Route::resource('/school-operational/json', 'SchoolOperationalAssistances\Ajax\SchoolOperationalAssistanceAjaxController');
//     Route::resource('/commodity-locations/json', 'CommodityLocations\Ajax\CommodityLocationAjaxController');
// });

// Route::group(['prefix' => 'commodities', 'as' => 'commodities.'], function () {
// });
