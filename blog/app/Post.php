<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property  int $user_id
 * @property int $ts
 * @property  string $content
 * @string $slug
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

    public function canDelete($user = null)
    {
        if(!$user) {
            $user = auth()->user();
        }

        return $user && $user->id == $this->user_id;


    }
}
