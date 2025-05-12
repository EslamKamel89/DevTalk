<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreUpdateRequest;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;

class PostStoreController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostStoreUpdateRequest $request, Discussion $discussion) {

        $post = Post::Create([
            'user_id' => auth()->id(),
            'discussion_id' => $discussion->id,
            'parent_id' => $request->parent_id ?? $discussion->firstPost->id,
            'body' => $request->body,
        ]);
        return redirect(
            route('discussions.show',  ['discussion' => $discussion->slug]) . '?post=' . $post->id
        );
    }
}
