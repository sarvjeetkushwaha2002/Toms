<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PdfController;
use App\Http\Controllers\admin\TextController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'indexDashboard')->name('indexDashboard');
});
Route::controller(PdfController::class)->group(function () {
    Route::get('all-convertor-pdf-tools', 'indexPdf')->name('indexPdf');
    Route::get('document-form', 'docForm')->name('docForm');
    Route::post('document-convert', 'uploadDocument')->name('uploadDocument');
});
Route::controller(TextController::class)->group(function () {
    Route::get('all-text-editor-tools', 'indexTextEditorall')->name('indexTextEditorall');
    Route::get('text-convertor-tools', 'textConvertortools')->name('textConvertortools');
    Route::get('small-text-generator', 'textSmalltools')->name('textSmalltools');
    Route::get('wide-text-generator', 'textWidetools')->name('textWidetools');
    Route::get('strikethrough-text-generator', 'textStrikethroughtools')->name('textStrikethroughtools');
    Route::get('reverse-text-generator', 'textReversetools')->name('textReversetools');
    Route::get('title-case-converter', 'textTitleCasetools')->name('textTitleCasetools');
    Route::get('italic-text-converter', 'textItalictools')->name('textItalictools');
    Route::get('binary-code-translator', 'textBinarycodetools')->name('textBinarycodetools');
    Route::get('morse-code-translator', 'textMorsecodetools')->name('textMorsecodetools');
    Route::post('document-convert', 'uploadDocument')->name('uploadDocument');
});
// });
