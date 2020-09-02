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
            <h2 class="blog-post-title"><a href="{{ route('news', ['id' => $news->id]) }}">{{ $news->title }}</a></h2>
            @if($news->created_at)
                <p class="blog-post-meta">{{ $news->created_at->format('d-m-Y H:i') }}   от <a href="#">Админ</a></p>
            @endif
            <p>{!! mb_substr($news->description, 0, 200) !!}</p>
        </div><!-- /.blog-post -->
    @empty
        <h2>Новостей нет</h2>
    @endforelse


    <nav class="blog-pagination">
        {{ $newsList->links() }}
    </nav>
@stop

