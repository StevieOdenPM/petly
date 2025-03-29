<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cart_id' => $this->cart_id,
            'products' => $this->whenLoaded('products', function() {
                return $this->products->map(function($product) {
                    return [
                        'product_name' => $product->product_name,
                        'product_desc' => $product->product_desc,
                        'product_stock' => $product->product_stock,
                        'product_price' => $product->product_price,
                        'pivot' => [
                            'quantity' => $product->pivot->quantity,
                            'total_price' => $product->pivot->total_price,
                        ]
                    ];
                });
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
