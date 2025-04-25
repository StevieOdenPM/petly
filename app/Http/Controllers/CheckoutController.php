<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function storeCheckout(Request $request)
    {
        $apiToken = session('api_token');
        $customerID = session('user_id');
        $transactionDate = Carbon::now()->toDateTimeString();
        $selectedItems = $request->selected_items;

        $response = Http::withToken($apiToken)
            ->post('http://petly.test:8080/api/customer/transaction', [
                'user_id' => $customerID,
                'status_name' => "pending",
                'cart_id' => $selectedItems,
                'transaction_date' => $transactionDate,
            ]);
        dd($response->body());
        $subtotal = array_sum(array_column($selectedItems, 'total_price'));
        $taxAmount = 25000;
        $total = $subtotal + $taxAmount;

        return view('checkout', [
            'subtotal' => $subtotal,
            'taxAmount' => $taxAmount,
            'total' => $total,
            'cartIds' => $selectedItems,
        ]);
    }
}
