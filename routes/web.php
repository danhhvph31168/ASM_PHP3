<?php
use App\Http\Controllers\Admin\LoaiTinController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TinController;
use App\Http\Controllers\TinController as TinClineController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [TinClineController::class, 'danhSach'])->name('danhSach');
Route::get('chi-tiet/{id}', [TinClineController::class, 'chiTiet'])->name('chiTiet');

Auth::routes();

//admin
Route::resource('admin/loaiTin', LoaiTinController::class);

Route::resource('admin/tin', TinController::class);


//  asm 5
Route::resource('admin/posts', PostController::class);
