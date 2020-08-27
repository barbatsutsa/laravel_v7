@extends('layouts.index')
@section('content')
    <div class="blog-post">
        <a href="{{ route('news.parser.add', ['cat' => 'music']) }}">Добавить новости музыки</a>
    </div>
    <div class="blog-post">
        <a href="{{ route('news.parser.add', ['cat' => 'sport']) }}">Добавить новости спорта</a>
    </div>
@stop

