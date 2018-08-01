@extends('layouts.app')
@section('pageTitle', 'Posts list')

@section('content')
    <div class="container">
        <div class="row">
                    @foreach($posts as $post)
                        @include('posts._post', ['post' => $post])
                    @endforeach
        </div>
    </div>
@endsection
