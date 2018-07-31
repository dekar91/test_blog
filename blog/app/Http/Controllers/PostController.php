<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function __construct()
{
//    Title::prepend(Conf::get('app.sitename'));
}
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function view($slug)
    {
        $post = Post::getBySlug($slug);
        var_dump($post);
        view()->share('seo_title', $post->seo_title);
        view()->share('seo_description', $post->seo_description);
        view()->share('seo_keywords', $post->seo_keywords);
        Title::prepend($post->seo_title);
        try {
            if ($post->status == 'active') {
                $post->increment('views');
            }
        } catch (QueryException $e) {
            //This is just for demo purposes.
        }
        return view('site.posts.view', ['post' => $post]);
    }
    public function tag($tag)
    {
        Title::prepend('Тэг: '.$tag);
        $data = [
            'posts' => Posts::i()->getPostsByTag($tag),
            'title' => Title::renderr(' : ', true),
            'q' => '',
        ];
        view()->share('seo_title', $data['title']);
        return view('site.posts.index', $data);
    }

    public function create(Request $request, $postId = null)
    {
        $post = Post::findOrNew($postId);

        if (empty($post)) {
            redirect()->back()->withInput();
        }

        $post->user_id = auth()->user()->id ?? null;
        $post->content = $request->get('content');
        $post->title = $request->get('title');
        $post->ts = time();
        $post->save();

        return view('posts.create', ['post' => $post]);
    }
    
    public function remove($slug = '')
    {
        $post = Post::getBySlug($slug);
        $user = auth()->user();

        if($post && ($user && ($post->user_id == $user->id))) {
            $post->delete();
            return true;
        }

        return false;

    }
}
