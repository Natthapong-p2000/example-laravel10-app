<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContorller;
use App\Http\Controllers\BlogController;

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
// ผู้อ่าน
Route::get('/',[BlogController::class, 'index']);
Route::get('/detail/{id}',[BlogController::class, 'detail']);


// Route::get('about', function () {
//     //return "<a href='".route('admin')."'>Login admin</a>"; // <== เรียก route จากชื่อที่ตั้งไว้
//     //return "<h1>เกี่ยวกับเรา</h1>";
    
// })->name('about');

// ส่งให้ไปทำงานที่  App\Http\Controllers\AdminContorller
Route::prefix('author')->group(function(){ // การจัดกลุ่มของ route (ผู้เขียน)
    Route::get('/about',[AdminContorller::class,'about'])->name('about');
    Route::get('/blog',[AdminContorller::class,'blog'])->name('blog');
    Route::get('/create',[AdminContorller::class,'create']);
    Route::post('/insert',[AdminContorller::class,'insert']);
    Route::get('/delete/{id}',[AdminContorller::class,'delete'])->name('delete');
    Route::get('/change/{id}',[AdminContorller::class,'change'])->name('change');
    Route::get('/edit/{id}',[AdminContorller::class,'edit'])->name('edit');
    Route::post('/update/{id}',[AdminContorller::class,'update'])->name('update');
});

Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('blog/{name}', function ($name) {
    return "<h1>blog ชื่อว่า ${name}</h1>";
});

Route::get('admin/user/bets/natthapong', function () {
    return "<h1>welcome Admin</h1>";
})->name('admin');// <== ตั้งชื่อ Route

// เมื่อหา route ไม่เจอให้แสดง fallback...
Route::fallback(function(){
    return "<h1>ไม่พบหน้าเพจ</h1>";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
