<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;

class DiscussionShowController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Discussion $discussion) {
        $discussion->load(['topic', 'particpants']);
        $posts = Post::where('discussion_id', $discussion->id)
            ->with(['user', 'discussion',])
            ->oldest()
            ->paginate(10);
        return inertia('forum/discussions/Show', [
            'discussion' => DiscussionResource::make($discussion),
            'posts' => PostResource::collection($posts),
        ]);
    }
}
