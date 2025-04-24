<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        // dd($this);
        $result = parent::toArray($request);
        $result['avatar'] = $this->resource->avatarUrl();
        return $result;
    }
}
