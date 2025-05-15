<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostUpdateController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, PostStoreUpdateRequest $request) {
        $post->update([
            'body' => $request->body,
        ]);
        $post->load(['discussion']);
        return redirect(
            route('discussions.show',  ['discussion' => $post->discussion->slug]) . '?post=' . $post->id
        );
    }
}
