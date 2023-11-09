<?php

namespace App\Services\Store;

use App\Models\Store;

class StoreService
{
    public function createStoreSetting(Store $store,$request)
    {
        $store->setting()->create($request->only(['include_vat_in_price','vatType','value','shipping_cost']));
    }
}
