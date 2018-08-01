@extends('layouts.app')
@section('pageTitle', $post->title )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="post-body">
                    {{--<img src="{{ starts_with($post->img, ['http://', 'https://']) ? '' : '/upload/' }}{{ $post->img }}" alt="" style="max-width: 100%;" class="post-image">--}}
                    <article>
                        <div class=" post-content">
                            <div class="">
                                <h1 class="">{{ $post->title }}</h1>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="">
                                            {!! $post->content !!}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div>
                                    <div>
                                        <i class="fa fa-clock-o"></i>
                                        Published: {{ date('Y-m-d H:i', $post->ts) }} by {{ $post->user->name }}
                                    </div>

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
