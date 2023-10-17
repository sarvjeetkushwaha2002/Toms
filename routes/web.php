<?php

use App\Http\Controllers\admin\CodeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FrontendBlogController;
use App\Http\Controllers\admin\PdfController;
use App\Http\Controllers\admin\TextController;
use App\Http\Controllers\admin\WebPageController;
use App\Http\Controllers\admin_pannel\BlogController;
use App\Http\Controllers\admin_pannel\CategoryController;
use App\Http\Controllers\admin_pannel\DashboardController as Admin_pannelDashboardController;
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

Route::get('/login', [Admin_pannelDashboardController::class, 'loginPage'])->name('login');
Route::post('admin/login', [Admin_pannelDashboardController::class, 'loginAdmin'])->name('admin-login');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:web'], function () {
    Route::controller(Admin_pannelDashboardController::class)->group(function () {
        Route::get('/dashboard', 'adminPannel')->name('adminPannel');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::post('category-add', 'categoryAdd')->name('categoryAdd');
        Route::get('is_active/{id}', 'is_active')->name('is_active');
        Route::get('category-edit/{id}', 'categoryEdit')->name('categoryEdit');
        Route::post('category-delete/{id}', 'categoryDelete')->name('categoryDelete');
        Route::post('category-update/{id}', 'categoryUpdate')->name('categoryUpdate');

        Route::get('/sub-category', 'subCategory')->name('subCategory');
        Route::post('sub-category-add', 'subCategoryAdd')->name('subCategoryAdd');
        Route::get('sub-category-edit/{id}', 'subCategoryEdit')->name('subCategoryEdit');
        Route::get('is_active-sub/{id}', 'is_activeSub')->name('is_activeSub');
        Route::post('sub-category-delete/{id}', 'subCategoryDelete')->name('subCategoryDelete');
        Route::post('sub-category-update/{id}', 'subCategoryUpdate')->name('subCategoryUpdate');


        Route::get('blog', 'Blog')->name('Blog');
        Route::post('blog-add', 'blogAdd')->name('blogAdd');
        Route::get('blog-edit/{id}', 'blogEdit')->name('blogEdit');
        Route::get('is_active-blog/{id}', 'is_activeBlog')->name('is_activeBlog');
        Route::post('blog-delete/{id}', 'blogDelete')->name('blogDelete');
        Route::post('blog-update/{id}', 'blogUpdate')->name('blogUpdate');
    });
    Route::controller(BlogController::class)->group(function () {
        Route::get('blog', 'Blog')->name('Blog');
        Route::get('fetch-sub-category/{category_id}', 'fetchSubcategory')->name('fetchSubcategory');
        Route::post('blog-add', 'blogAdd')->name('blogAdd');
        Route::get('blog-edit/{id}', 'blogEdit')->name('blogEdit');
        Route::get('is_active-blog/{id}', 'is_activeBlog')->name('is_activeBlog');
        Route::post('blog-delete/{id}', 'blogDelete')->name('blogDelete');
        Route::post('blog-update/{id}', 'blogUpdate')->name('blogUpdate');
    });
});

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
    Route::get('text-to-utf-8-encode', 'textToUtf8Encodetools')->name('textToUtf8Encodetools');
    Route::get('utf-8-encode-to-text-decode', 'utf8encodeToutf8decodetools')->name('utf8encodeToutf8decodetools');
    Route::get('json-to-csv', 'jsonToCsvtools')->name('jsonToCsvtools');
    Route::get('csv-to-json', 'csvToJsontools')->name('csvToJsontools');
    Route::get('color-code-picker', 'colorCodePicktools')->name('colorCodePicktools');
    Route::get('image-resize', 'imageResizetools')->name('imageResizetools');
    Route::get('text-to-speech', 'textToSpeechtools')->name('textToSpeechtools');
    Route::get('under-line-text', 'underLinetools')->name('underLinetools');
    Route::get('slug-url-text', 'slugifyUrltools')->name('slugifyUrltools');
    Route::get('json-stringify-text', 'jsonStringifytools')->name('jsonStringifytools');
    Route::get('find-replace-text', 'textFindreplacetools')->name('textFindreplacetools');
    Route::get('all-code-data-translator', 'allcodeDatatransalator')->name('allcodeDatatransalator');
    Route::get('bycript-text-generator', 'textBycripttools')->name('textBycripttools');
    Route::get('hex-code-translator', 'textHexcodetools')->name('textHexcodetools');
    Route::post('change-by-encript', 'textEncriptchange')->name('textEncriptchange');
    Route::post('check-by-encript', 'textEncriptcheck')->name('textEncriptcheck');
});
Route::controller(FrontendBlogController::class)->group(function () {
    Route::get('blog-list/{filter?}', 'blogFrontend')->name('blogFrontend');
    Route::get('blog-detail/{slug}', 'blogDetails')->name('blogDetails');
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
