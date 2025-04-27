<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DateTimeResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        /** @var Carbon $resource */
        $resource =  $this->resource;
        return [
            'friendly' => $resource->diffForHumans(),
            'raw' => $resource
        ];
    }
}
