@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Редактировать новость</h1><br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @csrf
            @method('PUT')
            <p><input type="text" class="form-control" name="img" placeholder="Ссылка на изображение"
                      value="{{ $news->img }}"></p>
            <p><input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{$news->title }}">
                @error('title') Заполните это поле @enderror</p>
            <p><input type="text" class="form-control" name="slug" placeholder="Слаг" value="{{$news->slug }}">
                @error('slug') Заполните это поле @enderror</p>
            <p><textarea class="form-control" name="description" placeholder="Текст">{!! $news->description !!}</textarea></p>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@stop
