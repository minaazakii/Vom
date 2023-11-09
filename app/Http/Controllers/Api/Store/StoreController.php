<?php

namespace App\Http\Controllers\Api\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StorestoreRequest;

class StoreController extends Controller
{
    public function store(StorestoreRequest $request)
    {
        Store::create($request->validated());
        return response()->json(['message'=>'Store Created Successfully']);
    }
}
