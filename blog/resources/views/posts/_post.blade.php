<div class="post col-sm-6">
    {{--<a href="{{ route('post-view', ['slug' => $post->slug]) }}"> image must be here--}}
    {{--</a>--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="post-content">
                <h2 class="post-title">
                    <a href="{{ route('post-view', ['slug' => $post->slug]) }}" class="post-link"> {{ $post->title }}</a>
                </h2>
                <div class="row">
                        <div class="col-sm-12">
                            <i class="fas fa-clock"></i>
                            <span class="text-muted">Published:</span>
                            <small class="text-muted">({{ date('d.m.Y', $post->ts) }})</small>
                        </div>
                    <div class="post-annotation col-sm-12">{{ strip_tags(substr($post->content,0, 40)) }}</div>
                        <div>
                            @if($post->canDelete())
                                <a href="{{ route('post-delete', ['slug' => $post->slug]) }}" class="post-delete" title="Remove post"><i class="fas fa-trash-alt"></i></a>
                                <a href="{{ route('post-create', ['postId' => $post->id]) }}" class="post-delete" title="Edit post"><i class="fas fa-edit"></i></a>
                                @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <hr />
</div>
