<?php

namespace App\Http\Controllers;

use App\Product;
use App\Receipt;
use App\ReceiptProducts;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function show($barcode) {
        $product = Product::where('barcode', $barcode)->with(['vat_class'])->get();

        return json_encode($product);
    }

    public function receipt(Request $request) {
        $receipt = new Receipt();
        $receipt->save();
        foreach ($request->barcodes as $barcode) {
            $receipt_product = new ReceiptProducts();
            $receipt_product->receipt_id = $receipt->id;
            $receipt_product->barcode = $barcode;
            $receipt_product->save();
        }

        return 'receipt saved!';
    }
}
