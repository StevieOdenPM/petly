<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    private $token = '1|CowEGhhk7E2Rfat334Rz1MeSl75J6FKbYw3I2ve9c9c7db8e';

    public function index(Request $request)
    {
        $response = Http::withToken($this->token)
            ->get('http://petly.test:8080/api/customer/cart');

        $data = $response->json();
        $items = $data['data'] ?? [];
        
        // Get selected items from the request or session
        $selectedItems = $request->has('selected_items') 
            ? $request->input('selected_items', []) 
            : session('selected_items', []);
        
        // Store selected items in session
        session(['selected_items' => $selectedItems]);
        
        // Calculate total based on selected items only
        $selectedTotal = 0;
        foreach ($items as $item) {
            if (in_array($item['cart_id'], $selectedItems)) {
                $selectedTotal += $item['total_price'];
            }
        }
        
        $tax = count($selectedItems) > 0 ? 25000 : 0;
        $total = $selectedTotal + $tax;

        return view('cart', compact('items', 'selectedTotal', 'tax', 'total', 'selectedItems'));
    }

    public function destroy($id)
    {
        Http::withToken($this->token)
            ->delete("http://petly.test:8080/api/customer/cart/{$id}");

        return redirect()->route('cart.index');
    }
}