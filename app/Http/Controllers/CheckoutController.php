<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;


require '../vendor/autoload.php';
// This is your test secret API key.
// \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);


// header("HTTP/1.1 303 See Other");
// header("Location: " . $checkout_session->url);



class CheckoutController extends Controller
{
  // header('Content-Type: application/json');
  // const $YOUR_DOMAIN = $_ENV['APP_URL'];
    public  function checkout()
    {
      $stripe->checkout->sessions->create([
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
header('Location:'.$checkout_session->url,true,303));
    }
}
