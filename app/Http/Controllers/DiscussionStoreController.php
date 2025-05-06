<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscussionStoreRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionStoreController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(DiscussionStoreRequest $request) {
        /** @var Discussion $discussion */
        $discussion = Discussion::create(
            $request->validated(['title', 'topic_id']) + ['user_id' => auth()->id()]
        );
        $discussion->posts()->create(
            $request->validated(['body']) + ['user_id' => auth()->id()]
        );
        return redirect(route('discussions.show', ['discussion' => $discussion->slug]));
    }
}
