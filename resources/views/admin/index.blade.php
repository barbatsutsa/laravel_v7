@extends('layouts.app')
@section('content')
<h1>Привет, админ</h1>
<br>
<a href="{{ route('news.index') }}">Список новостей</a>
@stop
