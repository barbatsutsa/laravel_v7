@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Заполните форму заказа</h1><br>
        <form method="post" action="{{ route('news.order.store') }}">
            @csrf
            <p><input type="text" class="form-control" name="name"  placeholder="Ваше имя" value="{{ old('name') }}"></p>
            <p><input type="phone" class="form-control" name="phone"  placeholder="Номер телефона для связи" value="{{ old('phone') }}">
                @error('phone') Заполните это поле @enderror
            </p>
            <p><input type="text" class="form-control" name="email"  placeholder="Ваш e-mail" value="{{ old('email') }}"></textarea></p>
            <p><textarea class="form-control" name="info" placeholder="Укажите, какую информацию Вы хотели бы получить" {!! old('info') !!}></textarea>
                @error('info') Заполните это поле @enderror
            </p>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@stop
