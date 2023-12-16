<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard/', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/chan', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
});
Route::middleware(['auth','role:agent'])->group(function () {
    Route::get('/agent/dashboard/', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::middleware(['auth','role:admin'])->group(function () {

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type/',  'AllType')->name('all.type');
        Route::get('/add/type/',  'AddType')->name('add.type');
        Route::post('/store/type/',  'StoreType')->name('store.type');
        Route::get('/edit/type/{id}',  'EditType')->name('edit.type');
        Route::get('/delete/type/{id}',  'DeleteType')->name('delete.type');
        Route::post('/update/type/',  'UpdateType')->name('update.type');

    });
});
Route::middleware(['auth','role:admin'])->group(function () {

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenitis/',  'AllAmenitis')->name('all.amenitis');
        Route::get('/add/amenitis/',  'AddAmenitis')->name('add.amenitis');
        Route::post('/store/amenitis/',  'StoreAmenitis')->name('store.amenitis');
        Route::get('/edit/amenitis/{id}',  'Editamenitis')->name('edit.amenitis');
        Route::get('/delete/amenitis/{id}',  'Deleteamenitis')->name('delete.amenitis');
        Route::post('/update/amenitis/',  'UpdateAmenitis')->name('update.amenitis');

    });
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission/',  'AllPermission')->name('all.permission');
        Route::get('/add/permission/',  'AddPermission')->name('add.permission');
        Route::post('/store/permission/',  'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}',  'Editpermission')->name('edit.permission');
        Route::get('/delete/permission/{id}',  'Deletepermission')->name('delete.permission');
        Route::get('/import/permission/',  'ImportPermission')->name('import.permission');
        Route::get('/export/permission/',  'ExportPermission')->name('export.permission');
        Route::post('/update/permission/',  'Updatepermission')->name('update.permission');

    });
});