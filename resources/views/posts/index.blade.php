@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    @foreach ($posts as $item)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="{{ route('post', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h2>
            <p class="blog-post-meta">{{ $item->created_at }} by <a href="#">Chris</a></p>
            <div class="blog-post__text">
                {{ $item->excerpt }}
            </div>
        </div><!-- /.blog-post -->
    @endforeach
    {{ $posts->render() }}
@endsection
