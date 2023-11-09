<?php

namespace App\Http\Controllers\Api\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StorestoreRequest;
use App\Services\Store\StoreService;

class StoreController extends Controller
{
    public $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function store(StorestoreRequest $request)
    {
        $store =  Store::create(['name' => $request->name, 'user_id' => auth('sanctum')->id()]);
        if($request->include_vat_in_price)
        {
            $this->storeService->createStoreSetting($store, $request);
        }
        return response()->json(['message' => 'Store Created Successfully']);
    }
}
