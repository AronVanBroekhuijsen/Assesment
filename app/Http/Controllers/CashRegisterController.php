<?php

namespace App\Http\Controllers;

use App\Product;
use App\Receipt;
use App\ReceiptProducts;
use App\VatClass;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function show($barcode)
    {
        $product = Product::where('barcode', $barcode)->with(['vat_class'])->get();

        return json_encode($product);
    }

    public function receipt()
    {
        $receipt = new Receipt();
        $receipt->save();

        return 'receipt saved!';
    }

    public function receipt_product($receipt_id, Request $request)
    {
        $receipt = Receipt::where('id', $receipt_id)->first();

        if ($receipt->finished != 1) {
            $exist = ReceiptProducts::where([['receipt_id', $receipt->id], ['barcode', $request->barcode]])->first();
            if ($exist) {
                $exist->amount = $exist->amount + 1;
                $exist->save();
            } else {
                $receipt_product = new ReceiptProducts();
                $receipt_product->receipt_id = $receipt->id;
                $receipt_product->product_id = $request->product_id;
                $receipt_product->amount = 1;
                $receipt_product->save();
            }
        } else {
            return 'This receipt is finished already';
        }

        return 'product added to receipt!';
    }

    public function change_receipt_product($receipt_product_id, Request $request)
    {
        $receipt_product = ReceiptProducts::where('id', $receipt_product_id)->first();
        $receipt = Receipt::where('id', $receipt_product->receipt_id)->first();
        if ($receipt->finished != 1) {
            $receipt_product->amount = $request->amount;
            $receipt_product->save();
        } else {
            return 'This receipt is finished already';
        }

        return "product amount changed!";
    }

    public function close_receipt($receipt_id)
    {
        $receipt = Receipt::where('id', $receipt_id)->first();
        $receipt->finished = 1;
        $receipt->save();

        return "product amount changed!";
    }

    public function receipt_list($receipt_id)
    {
        $receipt = Receipt::with(['receipt_product'])->where('id', $receipt_id)->first();

        foreach ($receipt->receipt_product as $receipt_product) {
            $product = Product::where('id', $receipt_product->product_id)->first();
            $vat = VatClass::where('id', $product->vat_id)->first();

            $receipt_product->name = $product->name;
            $receipt_product->cost = $product->cost;
            $receipt_product->vat = $vat->amount;
            $receipt_product->total = number_format($product->cost*$receipt_product->amount/100 * (100+$vat->amount), 2);
            $receipt->total = number_format($receipt->total+$receipt_product->total, 2);

            unset($receipt_product->id);
            unset($receipt_product->receipt_id);
            unset($receipt_product->product_id);
        }

        return json_encode($receipt);
    }
}
