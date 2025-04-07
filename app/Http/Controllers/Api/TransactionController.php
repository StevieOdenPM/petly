<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TransactionDetail;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransactionResource;
use App\Models\Cart;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Transaction::with(['users', 'transactionDetails.products.petType', 'transactionDetails.products.productType', 'transactionStatus'])->get();
        if ($product) {
            return TransactionResource::collection($product);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'status_name' => 'required|in:complete,progress,pending,canceled',
            'cart_id' => 'required|array',
            'transaction_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }



        DB::beginTransaction();
        try {
            $cart = Cart::where('cart_id', $request->cart_id)->first();
            $transactionStatus = TransactionStatus::where('transaction_status_name', $request->status_name)->first();

            $transaction = Transaction::create([
                'transaction_date' => $request->transaction_date,
                'user_user_id' => $request->user_id,
                'delivery_delivery_id' => null,
                'transactions_transaction_status_id' => $transactionStatus->transaction_status_id,
                'foreign_cart_id' => $cart->cart_id
            ]);

            $totalProduct = [];

            for ($i = 0; $i < count($cart->products); $i++) {
                $totalProduct[$i] = $cart->products[$i]->pivot->total_price;
            }

            $totalPayment = array_sum($totalProduct);

            $transactionDetail = TransactionDetail::create([
                'transaction_transaction_id' => $transaction->transaction_id,
                'total_payment' => $totalPayment,
            ]);
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully added',
                'data' => [
                    'transaction' => $transaction,
                    'user_user_id' => $transaction->user_user_id,
                    'transaction_status' => $transactionStatus,
                    'transaction_detail' => $transactionDetail,
                    'product' => $cart->products,
                ],
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Input Product failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|in:complete,progress,pending,canceled',
            'delivery_id' => 'nullable',
            'status_name' => 'required|in:complete,progress,pending,canceled',
            'total_price' => 'required|integer',
            'total_payment' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'transaction_date' => 'required|date',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $product = Transaction::with(['users', 'transactionDetails', 'transactionStatus'])->get();
        if ($product) {
            return TransactionResource::collection($product);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
