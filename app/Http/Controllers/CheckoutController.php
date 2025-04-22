<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processCart(Request $request)
    {
        $selectedItems = $request->input('selectedItems');
        
        // Store selected items in Laravel session
        session(['checkoutItems' => $selectedItems]);
        
        // Redirect to checkout page
        return redirect()->route('checkout');
    }
}
