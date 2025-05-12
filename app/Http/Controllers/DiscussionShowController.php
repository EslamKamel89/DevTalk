<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;

class DiscussionShowController extends Controller {
    public const POSTS_PER_PAGE = 10;
    public function __invoke(Request $request, Discussion $discussion) {
        $page =   $this->calculatePage($discussion);
        if ($page) {
            return redirect(
                route('discussions.show',  ['discussion' => $discussion->slug]) . '?postId=' . $request->post . '&page=' . $page
            );
        }
        $discussion->load(['topic', 'particpants'])
            ->loadCount(['posts']);
        $posts = Post::where('discussion_id', $discussion->id)
            ->with(['user', 'discussion',])
            ->oldest()
            ->paginate(self::POSTS_PER_PAGE);
        return inertia('forum/discussions/Show', [
            'discussion' => DiscussionResource::make($discussion),
            'posts' => PostResource::collection($posts),
        ]);
    }
    protected function calculatePage(Discussion $discussion) {
        if (!request()->has('post')) return null;
        $targetPostId = request()->get('post');
        $postsIds = Post::select('id')->where('discussion_id', $discussion->id)->get();
        // dump('postsIds', $postsIds);
        $postsCount = $postsIds->count();
        // dump('postsCount', $postsCount);
        $targetPostIndex = $postsIds->search(fn($model) => $model->id == $targetPostId);
        if (!$targetPostIndex) return null;
        // dump('targetPostId', $targetPostId);
        // dump('targetPostIndex', $targetPostIndex);
        $page = ceil(($targetPostIndex + 1)  / self::POSTS_PER_PAGE);
        return $page;
        // dump('page', $page);
        // dd('end');
    }
}
