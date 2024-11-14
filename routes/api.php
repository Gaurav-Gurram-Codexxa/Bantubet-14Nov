<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\OwnQuoteController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('subscribe/{subscription}', [SubscriptionController::class, 'subscribe']);

    Route::get('categories', [QuoteController::class, 'categories']);
    Route::get('subscription', [SubscriptionController::class, 'index']);

    Route::get('themes', [QuoteController::class, 'themes']);
    Route::get('video', [QuoteController::class, 'video']);
    Route::get('audio', [QuoteController::class, 'audio']);
    Route::get('exercises', [QuoteController::class, 'exercises']);
    Route::get('category_by_type', [QuoteController::class, 'category_by_type']);

    Route::resource('user/favorites', FavoriteController::class)->only([
        'index', 'store', 'destroy'
    ]);

    Route::post('user/preferences', [UserController::class, 'store']);

    Route::resource('user/collections', CollectionController::class)->only([
        'index', 'store', 'update', 'show', 'destroy'
    ]);
    Route::post('user/collections/{collection}/quote/{quote}', [CollectionController::class, 'addQuote']);
    Route::delete('user/collections/{collection}/quote/{quote}', [CollectionController::class, 'deleteQuote']);

    Route::resource('user/own_quotes', OwnQuoteController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);

    Route::get('quotes', [QuoteController::class, 'quotes']);
    Route::get('videos', [QuoteController::class, 'videos']);
    Route::get('audio', [QuoteController::class, 'audio']);
    Route::get('category/{category}/quotes', [QuoteController::class, 'quotesByCategory']);
});
