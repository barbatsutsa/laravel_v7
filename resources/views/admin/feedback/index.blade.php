@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('admin') }}">В админку</a>
    </div>
    <br>
    @if(session()->has('success'))
        <strong>{{ session()->get('success') }}</strong>
    @endif
    <div class="col-md-4 offset-2">
        @forelse($reviewList as $review)
            <div>
                <h2>{{ $review->name }} {{ $review->timestamps }}</h2>
                <p>{!! $review->review !!}</p>
                <a href=" {{ route('feedback.edit', ['review' => $review]) }}">Редактировать</a>
                <a href=" {{ route('feedback.destroy', ['review' => $review]) }}">Удалить</a>
                <hr>
            </div>
        @empty
            <h2>Отзывов нет</h2>
        @endforelse

    </div>
@stop

