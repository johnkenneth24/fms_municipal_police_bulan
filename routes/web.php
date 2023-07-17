<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrimeRecordController;
use App\Http\Controllers\CrimeGraphController;
use App\Http\Controllers\CaseSolvedController;
use App\Http\Controllers\CaseInvestController;
use App\Http\Controllers\CaseClearedController;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\SuspectController;

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


Route::group(['middleware' => 'auth'], function () {

    Route::controller(CrimeRecordController::class)->prefix('crime-record')->group(function () {
        Route::get('/', 'index')->name('cr.index');
        Route::get('/create', 'create')->name('cr.create');

    });

    Route::controller(CrimeGraphController::class)->prefix('crime-graph')->group(function () {
        Route::get('/', 'index')->name('cg.index');

    });

    Route::controller(CaseSolvedController::class)->prefix('case-solved')->group(function () {
        Route::get('/', 'index')->name('cs.index');

    });

    Route::controller(CaseClearedController::class)->prefix('case-cleared')->group(function () {
        Route::get('/', 'index')->name('cc.index');

    });

    Route::controller(CaseInvestController::class)->prefix('case-investigation')->group(function () {
        Route::get('/', 'index')->name('ci.index');

    });

    Route::controller(VictimController::class)->prefix('victim')->group(function () {
        Route::get('/', 'index')->name('v.index');

    });

    Route::controller(SuspectController::class)->prefix('suspect')->group(function () {
        Route::get('/', 'index')->name('s.index');

    });

    Route::get('/', [HomeController::class, 'home']);

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');






	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
