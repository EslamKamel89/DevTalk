<?php

namespace App\Http\Controllers;

use App\Http\Filters\MineFilter;
use App\Http\Filters\NoReplyFilter;
use App\Http\Filters\ParticipatingFilter;
use App\Http\Filters\PopularFilter;
use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ForumIndexController extends Controller {
    public function __invoke(Request $request) {
        // $discussions =
        return inertia('forum/Index', [
            'discussions' => DiscussionResource::collection(
                QueryBuilder::for(Discussion::class)
                    ->with(['topic', 'firstPost', 'latestPost.user', 'particpants'])
                    ->withCount('posts')
                    ->orderByLastPost()
                    ->orderByPinned()
                    ->latest()
                    ->allowedFilters($this->allowedFilters())
                    ->paginate(5)
                    ->withQueryString()
            )
        ]);
    }
    protected function allowedFilters(): array {
        return [
            AllowedFilter::custom('noreplies', new NoReplyFilter()),
            AllowedFilter::custom('popular', new PopularFilter()),
            AllowedFilter::custom('mine', new MineFilter()),
            AllowedFilter::custom('participating', new ParticipatingFilter())
        ];
    }
}
