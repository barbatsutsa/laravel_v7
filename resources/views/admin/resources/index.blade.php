@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('resourses.create') }}">Добавить источник</a>
        <br>
        <a href="{{ route('admin') }}">В админку</a>
        <br>
        <a href="{{ route('news.resourses.add') }}">Добавить новости из источников</a>
        <br>

    </div>
    <br>
    @if(session()->has('success'))
        <strong>{{ session()->get('success') }}</strong>
    @endif
    <div class="col-md-4 offset-2">
        @forelse($resourcesList as $resourse)
            <div>
                <h2>{{ $resourse->title }}</h2>
                <a href=" {{ route('resourses.edit', ['resourse' => $resourse]) }}">Редактировать</a>
                <a href=" {{ route('resourses.destroy', ['resourse' => $resourse]) }}">Удалить</a>


                <hr>
            </div>
        @empty
            <h2>Источников нет</h2>
        @endforelse

    </div>
@stop
