<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function storeCheckout(Request $request)
    {
        $apiToken = session('api_token');
        $customerID = session('user_id');
        $transactionDate = Carbon::now()->toDateTimeString();
        $selectedItem = $request->input('selected_item');
        
        try {
            $response = Http::withToken($apiToken)
                ->post('http://petly.test:8080/api/customer/transaction', [
                    'user_id' => $customerID,
                    'status_name' => "pending",
                    'cart_id' => $selectedItem,
                    'transaction_date' => $transactionDate,
                ]);

            $answer = $response->json('data');
            
            // Store checkout data in session for later use
            Session::put('checkout_data', $answer);
            
            // Get shipping fee from session or default
            $shippingFee = session('shipping_fee', 15000);
            $taxAmount = 25000;
            $total = $taxAmount + $answer['cart']['total_price'] + $shippingFee;

            return view('checkout', [
                'subtotal' => $answer['cart']['total_price'],
                'product' => $answer['product'],
                'user' => $answer['user'],
                'shippingFee' => $shippingFee,
                'userDetail' => $answer['user_detail'],
                'cart' => $answer['cart'],
                'taxAmount' => $taxAmount,
                'total' => $total,
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateShipping(Request $request)
    {
        $shippingFee = (int) $request->input('shipping_fee', 15000);

        // Validate the shipping fee
        if (!in_array($shippingFee, [15000, 50000])) {
            $shippingFee = 15000; // Default if invalid
        }

        // Store in session
        Session::put('shipping_fee', $shippingFee);
        
        // Get checkout data from session
        $checkoutData = Session::get('checkout_data');
        
        // Recalculate total with new shipping fee
        $taxAmount = 25000;
        $total = $taxAmount + $checkoutData['cart']['total_price'] + $shippingFee;
        
        return view('checkout', [
            'subtotal' => $checkoutData['cart']['total_price'],
            'product' => $checkoutData['product'],
            'user' => $checkoutData['user'],
            'shippingFee' => $shippingFee,
            'userDetail' => $checkoutData['user_detail'],
            'cart' => $checkoutData['cart'],
            'taxAmount' => $taxAmount,
            'total' => $total,
        ]);
    }

    public function showCheckout()
    {
        // Get checkout data from session
        $checkoutData = Session::get('checkout_data');
               
        // Get shipping fee from session or default
        $shippingFee = session('shipping_fee', 15000);
        $taxAmount = 25000;
        $total = $taxAmount + $checkoutData['cart']['total_price'] + $shippingFee;
        
        return view('checkout', [
            'subtotal' => $checkoutData['cart']['total_price'],
            'product' => $checkoutData['product'],
            'user' => $checkoutData['user'],
            'shippingFee' => $shippingFee,
            'userDetail' => $checkoutData['user_detail'],
            'cart' => $checkoutData['cart'],
            'taxAmount' => $taxAmount,
            'total' => $total,
        ]);
    }
}