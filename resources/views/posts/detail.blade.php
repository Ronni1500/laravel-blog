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
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
<form action="{{ route('comment.create') }}" method="GET">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="form-group row">
        <label for="inputName">Введите имя</label>
        <input type="text"
               name="name"
               class="form-control"
               id="inputName"
                value="@guest{{ 'Гость' }}@else{{ Auth::user()->name }}@endguest">
    </div>
    <div class="form-group row">
        <label for="formTextarea">Текст комментария</label>
        <textarea class="form-control" id="formTextarea" rows="3" name="text">{{ old('text') }}</textarea>
        @if($errors->has('text'))
            <p class="text-danger">
                Комментарий должен быть больше 10 символов
            </p>
        @endif
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </div>
</form>
@if($post->comment)
    <div class="comments">
        <h3 class="title-comments">Комментарии ({{ $post->comment->count() }})</h3>
    </div>
    <ul class="media-list">
        @foreach($post->comment as $comment)
            <li class="media">
                <div class="media-body">
                    <div class="media-heading">
                        <div class="author">{{ $comment->name }}</div>
                        <div class="metadata">
                            <span class="date">{{ $comment->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="media-text text-justify">{{ $comment->text }}</div>
                </div>
            </li>
        @endforeach
    </ul>
@endif
@endsection
