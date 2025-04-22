<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property-read \App\Models\Topic|null $topic
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\DiscussionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion query()
 * @property int $id
 * @property int|null $user_id
 * @property int $topic_id
 * @property string $title
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion whereUserId($value)
 * @property string|null $pinned_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discussion wherePinnedAt($value)
 * @method static Builder<static>|Discussion orderByPinned()
 * @mixin \Eloquent
 */
class Discussion extends Model {
    /** @use HasFactory<\Database\Factories\DiscussionFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'topic_id',
        'title',
        'slug',
        'pinned_at'
    ];
    protected static function booted(): void {
        static::created(function (Discussion $discussion) {
            $discussion->update([
                'slug' => $discussion->id . '-' . str($discussion->title)->slug()
            ]);
        });
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function topic(): BelongsTo {
        return $this->belongsTo(Topic::class);
    }
    public function isPinned(): bool {
        return !is_null($this->pinned_at);
    }
    public function scopeOrderByPinned(Builder $query) {
        $query->orderBy('pinned_at', 'desc');
    }
}
