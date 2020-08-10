@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('admin.news.create') }}">Добавить новость</a>
    <br>
    <a href="{{ route('admin') }}">В админку</a>
</div>
<br>
@if(session()->has('success'))
    <strong>{{ session()->get('success') }}</strong>
@endif
<div class="col-md-4 offset-2">
    @isset($n['title']) @endisset
    @forelse($news as $n)
        <div>
            <h2><a href=" {{ route('admin.news.edit', ['id' => $n['id']]) }}">{{ $n['title'] }}</a></h2>
            <p>{{ $n['text'] }}</p>
        </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse

</div>
@stop
