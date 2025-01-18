<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk login (menampilkan halaman login jika belum login)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');// Redirect ke dashboard jika sudah login
    }
    return inertia('Login'); // Menampilkan halaman login jika belum login
})->name('login');

// Route untuk dashboard (ditangani berdasarkan role)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'admin') {
            return Inertia::render('Admin/AdminDashboard');
        } elseif ($user->role === 'tenant') {
            return Inertia::render('Tenant/TenantDashboard');
        } 

        abort(403, 'Unauthorized. Role tidak terdefinisi.');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
