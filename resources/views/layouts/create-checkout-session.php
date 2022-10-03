<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('$_ENV['STRIPE_SECRET']');

header('Content-Type: application/json');

$YOUR_DOMAIN = $_ENV['DOMAIN'];

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1KtG5rCyDKFdIKJoddLhKESf',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '?success=true',
  'cancel_url' => $YOUR_DOMAIN . '?canceled=true',
  'automatic_tax' => [
    'enabled' => true,
  ],
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);