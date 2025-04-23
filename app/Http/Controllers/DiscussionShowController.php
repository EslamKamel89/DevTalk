<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionShowController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Discussion $discussion) {
        return inertia('forum/discussions/Show', [
            'discussion' => DiscussionResource::make($discussion)
        ]);
    }
}
