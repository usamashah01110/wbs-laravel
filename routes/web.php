<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipientController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::get('/all/documents', [DocumentController::class, 'index']);
Route::get('/all/attorny/documents', [DocumentController::class, 'attornyDocuments']);
Route::post('/documents', [DocumentController::class, 'store']);
Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);

Route::get('/recipients/list', [RecipientController::class, 'list'])->name('recipients.list');
Route::post('/recipients/store', [RecipientController::class, 'store'])->name('recipients.store');
Route::put('/recipients/update/{id}', [RecipientController::class, 'update'])->name('recipients.update');
Route::delete('/recipients/delete/{id}', [RecipientController::class, 'delete'])->name('recipients.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
