<?php

namespace App\Http\Resources;

use App\Models\Courier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'delivery_deadline' => $this->delivery_deadline,
            'delivery_address' => $this->delivery_address,
            'courier' => new UserResource($this->whenLoaded('user')),
            'courier_detail' => new CourierResource($this->whenLoaded('courier')),
            'delivery_class' => new DeliveryClassResource($this->whenLoaded('deliveryClass')),
        ];
    }
}
