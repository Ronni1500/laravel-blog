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
<form action="">
    @csrf
    <div class="form-group row">
        <label for="inputName">Введите имя</label>
        <input type="name"
               class="form-control"
               id="inputName"
                value="@guest{{ 'Гость' }}@else{{ Auth::user()->name }}@endguest">
    </div>
    <div class="form-group row">
        <label for="formTextarea">Текст комментария</label>
        <textarea class="form-control" id="formTextarea" rows="3"></textarea>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </div>
</form>
@endsection
