<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostDeleteController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request) {
        $post->load(['discussion']);
        $discussionSlug = $post->discussion->slug;
        $post->delete();
        return redirect(
            route('discussions.show',  ['discussion' => $discussionSlug])
        );
    }
}
