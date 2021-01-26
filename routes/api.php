<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->as('api.v1.')->group(function() {

    // 小程序登录
    Route::post('weapp/authorizations', [Api\AuthorizationsController::class, 'weappStore'])->name('weapp.authorizations.store');

    Route::get('card-groups', [Api\CardGroupsController::class, 'index'])->name('card-groups.index');

    Route::get('cards', [Api\CardsController::class, 'index'])->name('cards.index');
    Route::post('cards/{card}/audio', [Api\CardsController::class, 'toAudio'])->name('cards.toAudio');

    Route::get('pages/{page:key}', [Api\PagesController::class, 'show'])->name('pages.show');
});
