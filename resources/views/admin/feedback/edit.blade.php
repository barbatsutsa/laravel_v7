@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Редактировать отзыв</h1><br>
        <form method="post" action="{{ route('feedback.update'), ['reviews' => $feedback]) }}">
            @csrf
            <p><input type="text" class="form-control" name="name"  placeholder="Ваше имя" value="{{ $feedback->'name' }}">
                @error('name') Заполните это поле @enderror
            </p>
            <p><textarea class="form-control" name="review" placeholder="Отзыв" {!! $feedback->'review' !!}></textarea>
                @error('review') Заполните это поле @enderror
            </p>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@stop
