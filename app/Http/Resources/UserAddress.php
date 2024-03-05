<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddress extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'status' => $this->status_id,
            'address' => $this->order->address,
            'datetime' => $this->order->datetime,
        ];
    }
}
