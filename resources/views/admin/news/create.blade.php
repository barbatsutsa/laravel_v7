@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Добавить новость</h1><br>
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <p><input type="number" class="form-control" name="id"  placeholder="ID" value="{{ old('id') }}"></p>
            <p><input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ old('title') }}">
                @error('title') Заполните это поле @enderror
            </p>
            <p><textarea class="form-control" name="text" placeholder="Текст" {!! old('text') !!}></textarea></p>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
@stop

