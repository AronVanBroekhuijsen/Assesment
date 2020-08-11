<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list($api) {
        $user = User::where('api', $api)->first();

        if ($user->role === 'admin') {
            $products = Product::with(['vat_class'])->get();
        } else {
            return 'Method not allowed!';
        }

        return json_encode($products);
    }

    public function store(Request $request) {
        $user = User::where('api', $request->api)->first();

        if ($user->role === 'admin') {
            $product = new Product();
            $product->fill($request->toArray());
            $product->save();
        } else {
            return 'Method not allowed!';
        }

        return 'Product saved!';
    }
}
