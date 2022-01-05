<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show specific product using route model. 
     *
     * @param Product $product
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
