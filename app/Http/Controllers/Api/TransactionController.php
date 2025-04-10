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
        $transaction = Transaction::with(['users', 'cart.product', 'transactionStatus', 'transactionDetails'])->get();
        if ($transaction) {
            return TransactionResource::collection($transaction);
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

            $transactionStatus = TransactionStatus::where('transaction_status_name', $request->status_name)->first();

            $transaction = Transaction::create([
                'transaction_date' => $request->transaction_date,
                'user_user_id' => $request->user_id,
                'delivery_delivery_id' => null,
                'transactions_transaction_status_id' => $transactionStatus->transaction_status_id,
            ]);

            $totalPayment = 0;

            foreach ($request->cart_id as $value) {
                $cart = Cart::where('cart_id', $value)->first();
                $cart->update([
                    'foreign_transaction_id' => $transaction->transaction_id,
                ]);
                $totalPayment+=$cart->total_price;
            }

            $transactionDetail = TransactionDetail::create([
                'transaction_transaction_id' => $transaction->transaction_id,
                'total_payment' => $totalPayment,
            ]);
            DB::commit();

            $allProduct = Cart::where('foreign_transaction_id', $transaction->transaction_id)->get();

            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully added',
                'data' => [
                    'transaction' => $transaction,
                    'user_user_id' => $transaction->user_user_id,
                    'transaction_status' => $transactionStatus,
                    'transaction_detail' => $transactionDetail,
                    'product' => $allProduct,
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
