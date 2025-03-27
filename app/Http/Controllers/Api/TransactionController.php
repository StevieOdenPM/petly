<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Delivery;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Transaction::with(['users', 'transactionDetails', 'transactionStatus'])->get();
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
            'delivery_id' => 'nullable',
            'status_name' => 'required|in:complete,progress,pending,canceled',
            'total_price' => 'required|integer',
            'total_payment' => 'nullable|integer',
            'quantity' => 'nullable|integer',
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
            // $delivery = Delivery::where('delivery_id', $request->status_name)->first();

            $transaction = Transaction::firstOrCreate([
                'transaction_date' => $request->transaction_date,
                'total_price' => $request->total_price,
                'user_user_id' => $request->user_id,
                'delivery_delivery_id' => $request->delivery_id ?? 1,
                'transactions_transaction_status_id' => $transactionStatus->transaction_status_id
            ]);

            $transactionDetail = TransactionDetail::create([
                'transaction_transaction_id' => $transaction->transaction_id,
                'quantity' => $request->quantity,
                'total_payment' => $request->quantity * $request->total_price
            ]);
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully added',
                'data' => [
                    'transaction_date' => $transaction->transaction_date,
                    'total_price' => $transaction->total_price,
                    'user_user_id' => $transaction->user_user_id,
                    'delivery_delivery_id' => $transaction->delivery_delivery_id,
                    'transaction_status' => $transactionStatus,
                    'transaction_detail' => $transactionDetail
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
        //
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
