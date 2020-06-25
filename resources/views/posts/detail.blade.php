@extends('layouts.app')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">Chris</a></p>
    <div class="blog-post__text">
        {{ $post->content }}
    </div>
</div><!-- /.blog-post -->
@endsection
