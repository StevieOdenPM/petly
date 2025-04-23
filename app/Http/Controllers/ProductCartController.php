<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductCartController extends Controller
{
    public function store(Request $request)
    {
        $apiToken = session('api_token');
        Http::withToken($apiToken)
            ->post('http://petly.test:8080/api/customer/cart', [
                'customer_user_id' => $request->customer_user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

        return back()->with('success', 'Input Cart Successful');
    }
}



