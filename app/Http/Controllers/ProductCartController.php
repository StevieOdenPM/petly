<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductCartController extends Controller
{
    public function hello(Request $request)
    {
        Http::withToken('1|CowEGhhk7E2Rfat334Rz1MeSl75J6FKbYw3I2ve9c9c7db8e')
            ->post('http://petly.test:8080/api/customer/cart', [
                'customer_user_id' => $request->customer_user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

        return back()->with('success', 'Input Cart Successful');
    }
}



