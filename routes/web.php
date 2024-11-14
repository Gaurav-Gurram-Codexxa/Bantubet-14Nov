<?php

use App\Http\Controllers\CalculatePercent;
use App\Http\Controllers\CasinoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimitController;
use App\Http\Controllers\ProxyPayController;
use App\Http\Controllers\SportBookController;
use App\Http\Controllers\TaxableBetController;
use App\Http\Controllers\StatisticReportController;
use App\Http\Controllers\TaxReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CasinoTaxableBetController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.  These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('clear-cache', function () {
	Artisan::call('optimize:clear');
});
Route::get('sync-stats', [CalculatePercent::class, 'summery']);
Route::get('/proxy-register', [ProxyPayController::class, 'newRegistrations']);

Route::middleware([Authenticate::class])->group(function () {
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/home', [HomeController::class, 'index']);

	Route::get('casino', [CasinoController::class, 'index'])->name('casino');
	Route::get('sport-book', [SportBookController::class, 'index'])->name('sport-book');
	Route::get('taxable-bet', [TaxableBetController::class, 'index'])->name('taxable-bet');
	Route::get('casino-taxable-bet', [CasinoTaxableBetController::class, 'index'])->name('casino-taxable-bet');
	Route::get('statistic-report', [StatisticReportController::class, 'index'])->name('statistics-report');
	Route::get('tax', [TaxReportController::class, 'index'])->name('tax-report');
	Route::resource('users', UserController::class);
	Route::resource('limit', LimitController::class);
	Route::post('dashboard', [HomeController::class, 'dashboard']);
	Route::post('change-locale', [HomeController::class, 'changeLocale']);
	Route::post('update-setting', [HomeController::class, 'updateSetting']);
	Route::post('update-password', [UserController::class, 'changePassword']);
	Route::get('set-limit', [LimitController::class, 'updateStakeLimit'])->name('set-limit');
	Route::get('bet-list', [SportBookController::class, 'list'])->name('bet-list');
	Route::get('taxable-bet-list', [TaxableBetController::class, 'list'])->name('taxable-bet-list');
	Route::get('casino-taxable-bet-list', [CasinoTaxableBetController::class, 'list'])->name('casino-taxable-bet-list');
	Route::get('user-list', [UserController::class, 'list'])->name('user-list');
	Route::get('limit-list', [LimitController::class, 'list'])->name('limit-list');
	Route::get('tax-list', [TaxReportController::class, 'list'])->name('tax-list');
	Route::get('statistic-list', [StatisticReportController::class, 'list'])->name('statistic-list');
	Route::get('casino-list', [CasinoController::class, 'list'])->name('casino-list');
	Route::get('exportSportBook', [TaxableBetController::class, 'exportSportBook'])->name('exportSportBook');
});
