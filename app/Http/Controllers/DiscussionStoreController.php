<?php

namespace App\Http\Controllers;

use App\Helpers\pr;
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
            $request->validated() + ['user_id' => auth()->id()]
        );

        $discussion->posts()->create(
            ['body' => $request->body, 'user_id' => auth()->id()]
        );
        return redirect(route('discussions.show', ['discussion' => $discussion->slug]));
    }
}
