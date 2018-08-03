<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function view($slug)
    {
        $post = Post::getBySlug($slug);
        return new PostResource($post);
    }

    public function create(Request $request, $postId = null)
    {
        $this->middleware('auth');

        $post = Post::findOrNew($postId);

        if($request->method() == Request::METHOD_POST)
        {
            $post = $this->validate($request, [
                'title' => 'required|unique:mongodb.posts|max:255',
                'content' => 'required',
            ]);


            if (empty($post)) {
                redirect()->back()->withInput();
            }

            $post->user_id = auth()->user()->id ?? null;
            $post->content = $request->get('content');
            $post->title = $request->get('title');
            $post->ts = time();
            $post->slug = str_slug($post->title, '_');;
            $post->save();

            return
                redirect(route('post-view', ['slug'=> $post->slug]));
        };

        return view('posts.create', ['post' => $post]);
    }

    public function delete($slug = '')
    {

        $post = Post::getBySlug($slug);
        $user = auth()->user();

        if($post->getHasAccess($user)) {
            $post->delete();
            return true;
        }

        return false;

    }
}
