<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Stripe;

require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);

class ProductController extends Controller
{
    public function index()
    {
        $products = \Stripe\Product::all([]);
        return $products->data;
        // return Inertia::render('Welcome', ['products' => $products->data]);
        
    }
}
