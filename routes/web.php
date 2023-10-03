<?php

use App\Http\Controllers\admin\CodeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PdfController;
use App\Http\Controllers\admin\TextController;
use App\Http\Controllers\admin\WebPageController;
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
    Route::get('privacy-policy', 'privacyPolicy')->name('privacyPolicy');
    Route::get('contact-us', 'contactUs')->name('contactUs');
    Route::get('terms-and-conditions', 'termsAndConditions')->name('termsAndConditions');
});
Route::controller(PdfController::class)->group(function () {
    Route::get('all-convertor-pdf-tools', 'indexPdf')->name('indexPdf');
    Route::get('document-form', 'docForm')->name('docForm');
    Route::post('document-convert', 'uploadDocument')->name('uploadDocument');
});
Route::controller(TextController::class)->group(function () {
    Route::get('all-text-editor-tools', 'indexTextEditorall')->name('indexTextEditorall');
    Route::get('text-convertor-tools', 'textConvertortools')->name('textConvertortools');
    Route::get('plan-text-convertor', 'plantextConvertortools')->name('plantextConvertortools');
    Route::get('small-text-generator', 'textSmalltools')->name('textSmalltools');
    Route::get('wide-text-generator', 'textWidetools')->name('textWidetools');
    Route::get('strikethrough-text-generator', 'textStrikethroughtools')->name('textStrikethroughtools');
    Route::get('reverse-text-generator', 'textReversetools')->name('textReversetools');
    Route::get('title-case-converter', 'textTitleCasetools')->name('textTitleCasetools');
    Route::get('italic-text-converter', 'textItalictools')->name('textItalictools');
    Route::get('bold-text-converter', 'textBoldtools')->name('textBoldtools');
    Route::get('binary-code-translator', 'textBinarycodetools')->name('textBinarycodetools');
    Route::get('morse-code-translator', 'textMorsecodetools')->name('textMorsecodetools');
    Route::get('social-media-text-converter', 'textSocialtools')->name('textSocialtools');
    Route::get('bubble-text-converter', 'textBubbletools')->name('textBubbletools');
    Route::get('duplicate-line-remover', 'textduplicateLinetools')->name('textduplicateLinetools');
    Route::post('document-convert', 'uploadDocument')->name('uploadDocument');
});

Route::controller(CodeController::class)->group(function () {
    Route::get('text-to-speech', 'textToSpeechtools')->name('textToSpeechtools');
    Route::get('find-replace-text', 'textFindreplacetools')->name('textFindreplacetools');
    Route::get('all-code-data-translator', 'allcodeDatatransalator')->name('allcodeDatatransalator');
    Route::get('bycript-text-generator', 'textBycripttools')->name('textBycripttools');
    Route::get('hex-code-translator', 'textHexcodetools')->name('textHexcodetools');
    Route::post('change-by-encript', 'textEncriptchange')->name('textEncriptchange');
    Route::post('check-by-encript', 'textEncriptcheck')->name('textEncriptcheck');
});

Route::controller(WebPageController::class)->group(function () {
    Route::get('term-condition', 'termAndConditions')->name('termAndConditions');
    Route::get('contact-us', 'contactUs')->name('contactUs');
    Route::get('term-condition-page', 'termConditionPage')->name('termConditionPage');
    Route::get('fetch-states/{country_id}', 'fetchStates')->name('fetchStates');
    Route::post('create-terms-condition', 'createTermsCondition')->name('createTermsCondition');
    Route::get('view-page', 'viewPage')->name('viewPage');
    Route::get('contact-us-page', 'contactUsPage')->name('contactUsPage');
    Route::post('create-contact-us', 'createContactUs')->name('createContactUs');
    Route::get('view1-page', 'viewPage1')->name('viewPage1');
    Route::get('about-us-page', 'aboutUsPage')->name('aboutUsPage');
    Route::post('create-about-us', 'createAboutUs')->name('createAboutUs');
    Route::get('view2-page', 'viewPage2')->name('viewPage2');
    Route::get('privacy-policy-page', 'privacyPolicyPage')->name('privacyPolicyPage');
    Route::post('create-privacy-policy', 'createPrivacyPolicy')->name('createPrivacyPolicy');
    Route::get('view3-page', 'viewPage3')->name('viewPage3');
});
// });
