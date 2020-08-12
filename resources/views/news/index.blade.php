@extends('layouts.index')
@section('content')
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        Новости
    </h3>
    @if(session()->has('success'))
        <strong>{{ session()->get('success') }}</strong>
        <hr>
    @endif

    @forelse($newsList as $news)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a></h2>
            <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>
            <p>{!! mb_substr($news->description, 0, 200) !!}</p>
        </div><!-- /.blog-post -->
    @empty
        <h2>Новостей нет</h2>
    @endforelse


    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>
@stop

