<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'discussion_id' => $this->discussion_id,
            'parent_id' => $this->parent_id,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'user' => UserResource::make($this->whenLoaded('user')),
            'discussion' => UserResource::make($this->whenLoaded('discussion')),
        ];
    }
}
