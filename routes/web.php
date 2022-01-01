<?php

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

Auth::routes(['verify'=>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/profile/wizard', [App\Http\Controllers\ProfileController::class, 'wizard'])->name('wizard');

Route::post('/profile/wizard-store', [App\Http\Controllers\ProfileController::class, 'wizardStore'])->name('wizardStore');

Route::get('/my-profile', [App\Http\Controllers\ProfileController::class, 'myProfile'])->name('myProfile');

Route::post('/profile/store', [App\Http\Controllers\ProfileController::class, 'profileStore'])->name('profileStore');

Route::get('/initiatives', [App\Http\Controllers\HomeController::class, 'initiatives'])->name('initiatives');

Route::get('/initiatives/create', [App\Http\Controllers\HomeController::class, 'createInitiative'])->name('createInitiative');

Route::get('/initiatives/show/{id}', [App\Http\Controllers\HomeController::class, 'showInitiative'])->name('showInitiative');

Route::get('/initiatives/apply/{id}', [App\Http\Controllers\HomeController::class, 'initiativeApply'])->name('initiativeApply');

Route::post('/initiatives/store', [App\Http\Controllers\HomeController::class, 'initiativeStore'])->name('initiativeStore');

// Route::get('/profile/categories', [App\Http\Controllers\ProfileController::class, 'profileCategories'])->name('personalCategories');

// Route::post('/profile/categories-store', [App\Http\Controllers\ProfileController::class, 'profileCategoriesStore'])->name('personalCategoriesStore');

Route::get('file-export-xlsx-users', [App\Http\Controllers\ExportController::class, 'fileExportXlsxUsers'])->name('file-export-xlsx-users');

Route::get('file-export-csv-users', [App\Http\Controllers\ExportController::class, 'fileExportCsvUsers'])->name('file-export-csv-users');

Route::get('file-export-xlsx-userinitiative', [App\Http\Controllers\ExportController::class, 'fileExportXlsxUserinitiative'])->name('file-export-xlsx-userinitiative');

Route::get('file-export-csv-userinitiative', [App\Http\Controllers\ExportController::class, 'fileExportCsvUserinitiative'])->name('file-export-csv-userinitiative');