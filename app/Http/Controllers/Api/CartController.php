<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::with(['products'])->get();
        if ($carts) {
            return CartResource::collection($carts);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'customer_user_id' => 'required|integer',
            'quantity' => 'required|array',
            'product' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $cart = Cart::create([
                'customer_user_id' => $request->customer_user_id,
            ]);
            $inc = 0;
            foreach ($request->product as $productId) {
                $product = Product::find($productId);
                if (!$product) {
                    return response()->json([
                        'status' => false,
                        'message' => 'No product available with ' . $productId,
                    ], 422);
                }
                $cart->products()->attach($product->product_id, [
                    'quantity' => $request->quantity[$inc],
                    'total_price' => $request->quantity[$inc] * $product->product_price
                ]);
                $inc++;
            }

            if (isset($validatedData['products'])) {
                $cart->products()->sync($validatedData['products']);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Input Cart Successful",
                'data' => $cart,
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Input Cart Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        try {
            $cart->load(['products']);
            return response()->json([
                'status' => true,
                'message' => "Cart Found",
                'data' => new CartResource($cart)
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Get Cart Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json([
            'status' => true,
            'message' => "Delete Cart Successful",
        ], 201);
    }
}
