<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
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
    Route::get('member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('member/{member}/update', [MemberController::class, 'update'])->name('member.update');
    Route::get('member/{member}/show', [MemberController::class, 'show'])->name('member.show');
    Route::patch('member/{member}/active', [MemberController::class, 'active'])->name('member.active');
    Route::patch('member/{member}/stop', [MemberController::class, 'stop'])->name('member.stop');

    // 講師追加
    Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');

    // 各単元表示ルート
    Route::get('/frontend', [MemberController::class, 'frontend'])->name('frontend');
    Route::get('/serverside', [MemberController::class, 'serverside'])->name('serverside');
    Route::get('/laravel', [MemberController::class, 'laravel'])->name('laravel');
    Route::get('/customtask', [MemberController::class, 'customtask'])->name('customtask');
    // 講師別担当一覧
    Route::get('member/teacher/{teacher}', [MemberController::class, 'teachermember'])->name('teacher.member');
});

require __DIR__ . '/auth.php';
