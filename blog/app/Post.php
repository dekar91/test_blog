<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property-read int $user_id
 * @property-read int $ts
 * @property string $tile
 * @property string $content
 * @property string $slug
 * @property-read string $url
 * @property-read string $deleteUrl
 * @property-read string $editUrl
 */
class Post extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'posts';

    protected $fillable = [
        'ts', 'user_id', 'content', 'title', 'keywords', 'slug', 'created'
    ];

    public static function getBySlug($slug)
    {
        return self::query()->where('slug', $slug)->first();
    }

    public static function findOrNew($postId)
    {
        $post = self::query()->where('id', $postId)->first();

        if(!$post)
        {
            $post = new self;
        }

        return $post;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
//        return User::query()->find($this->user_id);
    }

    public function getUrlAttribute()
    {
        return route('post-view', ['slug' => $this->slug]);

    }

    public function getDeleteUrlAttribute()
    {
        return route('post-delete', ['slug' => $this->slug]);

    }

    public function getEditUrlAttribute()
    {
        return route('post-create', ['slug' => $this->slug]);

    }

    public function getHasAccessAttribute($user = null):bool
    {
        if(!$user) {
            $user = auth()->user();
        }

        return $user && $user->id == $this->user_id;
    }
}
