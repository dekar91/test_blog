@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ $post->editUrl }}"
                              aria-label="{{ __('Create new post') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-1 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title" value="{{ old('title', $post->title) }}" required autofocus>

                                    @if ($errors->has('text'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                       class="col-sm-1 col-form-label text-md-right">{{ __('Content') }}</label>

                                <div class="col-md-11">
                                    <textarea id="content" type="text" name="content"
                                              class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content', $post->content)  }}</textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('content');
        });
    </script>
@endsection