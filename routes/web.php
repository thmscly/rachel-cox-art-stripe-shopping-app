<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use app\Models\User;
use Laravel\Cashier\Checkout;
use App\Http\Controllers\CheckoutController;
use Stripe\Stripe;

require '../vendor/autoload.php';

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


//route to trigger the Stripe Checkout session (create-checkout-session.php)
// Route::post('/create-checkout-session', function () {
//     return;
// });

Route::post('/create-checkout-session', $stripe->checkout->sessions->create([
        'success_url' => 'https://example.com/success',
        'cancel_url' => 'https://example.com/cancel',
  //this is where specificity for the Product-specific Price Id (default_price) should be handled
        'line_items' => [
          [
            'price_data' => [
              'currency' => 'usd',
              'product_data' => [
                'name' => $name,
              ],'unit_amount' => $amount,
            'quantity' => 2,
          ],
        ],
  'mode' => 'payment',
]],
header('Location:'.$checkout_session->url,true,303)));


Route::get('/howdy', function () {
    return Inertia::render('Howdy');
});

require __DIR__.'/auth.php';
