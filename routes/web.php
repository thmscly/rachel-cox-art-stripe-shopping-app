<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use app\Models\User;
use Laravel\Cashier\Checkout;


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
    return Inertia::render('Welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index']);


//route to trigger the Stripe Checkout session
Route::get('/create-checkout-session', function (Request $request) {
    return $request->user()->checkout('price_1KtG5rCyDKFdIKJoddLhKESf');
});

Route::get('/howdy', function () {
    return Inertia::render('Howdy');
});

require __DIR__.'/auth.php';
