<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'username' => $this->username,
            'role_id' => new RoleResource($this->whenLoaded('role')),
            'email' => $this->email,
            'token' => $this->token,
            'created_at' => $this->created_at,
        ];
    }
}
