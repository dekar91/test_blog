@extends('layouts.app')
@section('pageTitle', $post->title )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="post-body">
                    <article>
                        <div class=" post-content">
                            <h1 class="post-title">{{ $post->title }}</h1>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    {!! $post->content !!}
                                </div>

                            </div>
                            <hr/>
                            <div>
                                <i class="fa fa-clock-o"></i>
                                Published: {{ date('Y-m-d H:i', $post->ts) }} by {{ $post->user->name }}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
