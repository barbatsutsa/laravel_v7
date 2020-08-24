@extends('layouts.app')
@section('content')
    <h1>Привет, {{ $user->name }}</h1>
    <br>
    <a href="{{ route('news.index') }}">Список новостей</a>
    @if(session()->has('error'))
        <h1 style="color:red;">{{ session()->get('error') }}</h1>
    @endif
@stop
