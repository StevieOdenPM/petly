<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CartsController extends Controller
{

    public function index(Request $request)
    {
        $apiToken = session('api_token');
        $response = Http::withToken($apiToken)
            ->get('http://petly.test:8080/api/customer/cart');


        // Check if the request was successful
        if ($response->successful()) {
            // Get cart items from the response
            $items = $response->json('data') ?? [];

            $selectedItems = $request->input('selected_items', []);

            // Initialize values
            $selectedTotal = 0;
            $tax = 0;
            $total = 0;

            // Only calculate if there are selected items
            if (!empty($selectedItems)) {
                foreach ($items as $item) {
                    if (in_array($item['cart_id'], $selectedItems)) {
                        $selectedTotal += floatval($item['total_price']);
                    }
                }

                // Apply flat tax of IDR 25,000 if any items are selected
                $tax = 25000;
                $total = $selectedTotal + $tax;
            }
        }


        return view('cart', compact('items', 'selectedTotal', 'tax', 'total', 'selectedItems'));
    }

    public function destroy($id)
    {
        $apiToken = session('api_token');
        Http::withToken($apiToken)
            ->delete("http://petly.test:8080/api/customer/cart/{$id}");

        return redirect()->route('cart.index');
    }
}
