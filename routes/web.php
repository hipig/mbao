<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [Auth\AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

});

Route::prefix('admin')->middleware('admin.auth')->as('admin.')->group(function () {

    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', Admin\UsersController::class)->except(['show', 'destroy']);

    Route::resource('plans', Admin\PlansController::class)->except('show');

    Route::resource('subscriptions', Admin\SubscriptionsController::class)->except(['edit', 'update', 'destroy']);

    Route::resource('pages', Admin\PagesController::class);

    Route::resource('card-groups', Admin\CardGroupsController::class)->except('show');

    Route::resource('cards', Admin\CardsController::class)->except('show');


    Route::prefix('filepond')->group(function () {
        Route::post('process', [Admin\FilepondUploadsController::class, 'process'])->name('filepond.process');
        Route::get('load', [Admin\FilepondUploadsController::class, 'load'])->name('filepond.load');
        Route::delete('revert', [Admin\FilepondUploadsController::class, 'revert'])->name('filepond.revert');
    });

});
