@extends('layouts.app')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ $post->created_at->format('Y-m-d') }} от <a href="#">{{ $post->user->name }}</a></p>
    <p>Просмотров: <b>{{ $post->views }}</b></p>
    <div class="blog-post__text">
        {{ $post->content }}
    </div>
</div><!-- /.blog-post -->
@endsection
