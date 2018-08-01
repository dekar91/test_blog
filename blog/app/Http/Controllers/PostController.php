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
        return view('posts.view', ['post' => $post]);
    }

    public function create(Request $request, $postId = null)
    {
        $this->middleware('auth');

        $post = Post::findOrNew($postId);

        if($request->method() == Request::METHOD_POST)
        {
            $this->validate($request, [
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

            return redirect(route('post-view', ['slug'=> $post->slug]));
        };

        return view('posts.create', ['post' => $post]);
    }

    public function delete($slug = '')
    {

        $post = Post::getBySlug($slug);
        $user = auth()->user();

        if($post->canDelete($user)) {
            $post->delete();
            return true;
        }

        return false;

    }
}
