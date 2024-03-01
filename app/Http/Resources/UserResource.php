<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'tell' => $this->tel,
            'email' => $this->email,
            'login' => $this->login,
            'role_id' => 3,
        ];
    }
}
