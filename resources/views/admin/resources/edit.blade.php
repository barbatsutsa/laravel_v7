@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Редактировать источник новостей</h1><br>
        <form method="post" action="{{ route('resourses.update', ['resourse' => $resourse]) }}">
            @csrf
            @method('PUT')

            <p><input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $resourse->title }}">
                @error('title') Заполните это поле @enderror</p>
            <p><input type="text" class="form-control" name="url" placeholder="Ссылка url" value="{{ $resourse->url }}">
                @error('url') Заполните это поле @enderror</p>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@stop
