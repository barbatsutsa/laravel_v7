@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Добавить отзыв</h1><br>
        <form method="post" action="{{ route('news.review.store') }}">
            @csrf
            <p><input type="text" class="form-control" name="name"  placeholder="Ваше имя" value="{{ old('name') }}">
                @error('name') Заполните это поле @enderror
            </p>
            <p><textarea class="form-control" name="review" placeholder="Отзыв" {!! old('review') !!}></textarea>
                @error('review') Заполните это поле @enderror
            </p>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@stop
