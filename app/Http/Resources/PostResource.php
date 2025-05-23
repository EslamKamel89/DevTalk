<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

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
            'html' => app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->highlightTheme('dracula')->toHtml($this->body),
            'created_at' => DateTimeResource::make($this->created_at),
            'user' => UserResource::make($this->whenLoaded('user')),
            'discussion' => DiscussionResource::make($this->whenLoaded('discussion')),
        ];
    }
}
