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
        $selectedItem = $request->input('selected_item');
        try {

            $response = Http::withToken($apiToken)
                ->post('http://petly.test:8080/api/customer/transaction', [
                    'user_id' => $customerID,
                    'status_name' => "pending",
                    'cart_id' => $selectedItem,
                    'transaction_date' => $transactionDate,
                ]);

            $shippingFee = (int) $request->input('shipping_fee', 0);

            // Optionally, you can validate it:
            if (!in_array($shippingFee, [15000, 50000])) {
                $shippingFee = 0;
            }

            $shippingMethod = session('shipping_method', 'fast');
            $shippingFee = session('shipping_fee', 15000);
            $answer = $response->json('data');
            $taxAmount = 25000;
            $total = $taxAmount + $answer['cart']['total_price'] + $shippingFee;

            return view('checkout', [
                'subtotal' => $answer['cart']['total_price'],
                'product' => $answer['product'],
                'user' => $answer['user'],
                'shippingMethod' => $shippingMethod,
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
        $shippingFee = (int) $request->input('shipping_fee', 0);

        // Optionally, you can validate it:
        if (!in_array($shippingFee, [15000, 50000])) {
            $shippingFee = 0;
        }

        return redirect()->route('checkout', ['shippingFee' => $shippingFee]);;
    }

    public function showCheckout()
    {
        $shippingFee = 15000; // Default option
        return view('checkout', compact('shippingFee'));
    }
}
