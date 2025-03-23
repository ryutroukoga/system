<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Models\Member;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //人材追加
    Route::get('/', [MemberController::class, 'index'])->name('home');
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::get('/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{member}/update', [MemberController::class, 'update'])->name('member.update');
    Route::get('/member/{member}/show', [MemberController::class, 'show'])->name('member.show');
    Route::patch('/member/{member}/active', [MemberController::class, 'active'])->name('member.active');
    Route::patch('/member/{member}/stop', [MemberController::class, 'stop'])->name('member.stop');
  
});

require __DIR__ . '/auth.php';
