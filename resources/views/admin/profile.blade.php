@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Изменение учетных данных</h1><br>
        @if(Session::has('MSG'))
            <div class="alert alert-success">
                {{ Session::get('MSG') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.profile.update') }}">
            @csrf

            @if($errors->has('name'))
                <div class="alert alert-danger">
                    @foreach($errors->get('name') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="name" placeholder="Имя" value="{{ $user->name }}"> <br>

            @if($errors->has('email'))
                <div class="alert alert-danger">
                    @foreach($errors->get('email') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="email" placeholder="E-mail" value="{{ $user->email }}"> <br>

            @if($errors->has('password'))
                <div class="alert alert-danger">
                    @foreach($errors->get('password') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input type="password" class="form-control" name="password" placeholder="Текущий пароль"> <br>

            @if($errors->has('newPassword'))
                <div class="alert alert-danger">
                    @foreach($errors->get('newPassword') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input type="Password" class="form-control" name="newPassword" placeholder="Новый пароль"> <br>

            <b>Права</b> <br>
            <label>Пользователь
                <input name="is_admin" type="radio" value="0" @if ((bool)$user->is_admin === false) checked @endif>
            </label><br>
            <label>Администратор
                <input name="is_admin" type="radio" value="1" @if ((bool)$user->is_admin === true) checked @endif>
            </label> <br>

            <button type="submit" class="form-control">Изменить</button>
        </form>
    </div>
@endsection
