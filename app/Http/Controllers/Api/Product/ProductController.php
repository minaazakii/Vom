<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\StoreProductRequest;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request)
    {
        // $availableLocale = config('translatable.locales');


        if (!Store::storeBelongToUser($request->store_id)) {
            return response()->json(["message"=>"This Store Doesn't Belong To this User"]);
        }
        $product = Product::create($request->validated());

        return response()->json(['message' => 'Product Added Successfully']);
    }
}
