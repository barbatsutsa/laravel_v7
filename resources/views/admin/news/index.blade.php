@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('news.create') }}">Добавить новость</a>
    <br>
    <a href="{{ route('admin') }}">В админку</a> <br>

</div>
<br>
@if(session()->has('success'))
    <strong>{{ session()->get('success') }}</strong>
@endif
<div class="col-md-4 offset-2">
    @forelse($newsList as $news)
        <div>
            <h2>{{ $news->title }}</h2>
            <a href=" {{ route('news.edit', ['news' => $news]) }}">Редактировать</a>
            <a href=" {{ route('news.destroy', ['news' => $news]) }}">Удалить</a>


            <hr>
        </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse

</div>
@stop
