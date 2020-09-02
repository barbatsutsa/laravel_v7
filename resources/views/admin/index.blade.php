@extends('layouts.app')
@section('content')
<h1>Привет, админ</h1>
<br>
<a href="{{ route('news.index') }}">Список новостей</a> <br>
<a href=" {{ route('admin.profile.update') }}">Редактирование профиля</a> <br>
<a href=" {{ route('resourses.index') }}">Источники новостей</a>

@stop
