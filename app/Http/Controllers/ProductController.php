<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request) {
        $product = new Product();
        $product->fill($request->toArray());
        $product->save();

        return 'Product saved!';
    }
}
