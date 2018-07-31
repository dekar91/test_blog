@extends('main')

<div>
    <form method="post" action="{{ route('post-create') }}">
        {!! csrf_field() !!}

        <input type="text" name="title" value = '{{ $post->title }}'>
        <textarea name="content">
        {{ $post->content }}
        </textarea>

        <button type="submit">Send</button>
    </form>
</div>