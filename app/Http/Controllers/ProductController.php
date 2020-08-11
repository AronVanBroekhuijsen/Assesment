<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list() {
        $products = Product::with(['vat_class'])->get();

        return json_encode($products);
    }

    public function store(Request $request) {
        $product = new Product();
        $product->fill($request->toArray());
        $product->save();

        return 'Product saved!';
    }
}
