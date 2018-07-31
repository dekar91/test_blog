<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property  int $user_id
 * @property int $ts
 * @property  string $content
 * @property \string $keywords
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
}
