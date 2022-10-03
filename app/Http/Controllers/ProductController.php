<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Stripe;

class ProductController extends Controller
{
    public function index()
    {
        $products = \Stripe\Product::all([]);
        return $products->data;
        // return Inertia::render('Welcome', ['products' => $products->data]);
    }
}
