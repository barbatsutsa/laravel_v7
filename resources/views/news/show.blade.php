@extends('layouts.index')
@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        @if($news->created_at)
            <p class="blog-post-meta">{{ $news->created_at->format('d-m-Y H:i') }}   от <a href="#">Админ</a></p>
        @endif

        <p><img src="{{ \Storage::url($news->img) }}" style="width: 250px"></p>
        <p>{!! $news->description !!}</p>

    </div><!-- /.blog-post -->
@stop

@push('js')
    <script>
        console.log("some text");
    </script>
@endpush
