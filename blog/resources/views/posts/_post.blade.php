<div class="post">
    <a href="{{ route('view', ['slug' => $post->slug]) }}">
        //
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="post-content">
                <h2 class="post-title">
                    <a href="{{ route('view', ['slug' => $post->slug]) }}"> {{ $post->title }}</a>
                </h2>
                <hr />
                <div class="row">
                        <div>
                            <i class="fa fa-clock-o"></i>
                            {{--<span class="text-muted">Опубликовано:</span>--}}
                            {{--{{ hdate($post->created) }}--}}
                            <small class="text-muted">({{ date('d.m.Y', $post->ts) }})</small>
                        {{--</div>--}}
                        <div>
{{--                            @include('site.partials.tags-list', ['tags' => $post->tags])--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
