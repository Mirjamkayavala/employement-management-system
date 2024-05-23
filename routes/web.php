<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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



// Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Route::match(['get', 'post'],'/employees', [EmployeeController::class, 'store'])->name('employees.store');
// Route::match(['get', 'post'], '/employees', '\App\Http\Controllers\EmployeeController\EmployeeController@store')->name('employees.store');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::view('dashboard', 'dashboard-blade-view');

Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route::get('/employees', 'EmployeeController@index');
// Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/show', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/search', [EmployeeController::class, 'search'])->name('search');
// Route::put('/employees/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
// Route::get('/view-employees', [EmployeeController::class, 'index'])->name('view-employees');
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');





Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['web'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
// });


Route::get('/dashboard', function () {


    return view('dashboard',['employees'=>\App\Models\Employee::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('profile', [EmployeeController::class, 'showProfile'])->name('profile');
    // Route::resource('employees', EmployeeController::class)->only(['create', 'store']);
    Route::resource('employees', EmployeeController::class);
    // Route::get('/employees', [EmployeeController::class, 'index']); // Allow viewing
    // Route::get('/employees/{id}', [EmployeeController::class, 'show']); // Allow viewing details


    // Route::middleware('admin')->group(function () {
    //     Route::resource('employees', EmployeeController::class)->except(['index']);
    // });

    // Route::middleware('employee')->group(function () {
    //     Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    // });
            
    
});
    

    // Route::get('profile', [EmployeeController::class, 'showProfile'])->name('profile.show');

    




require __DIR__.'/auth.php';
