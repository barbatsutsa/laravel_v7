@extends('layouts.app')
@section('content')
<h1>Привет, админ</h1>
<br>
<a href="<?=route('admin.news')?>">Список новостей</a>
@stop
