@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Добавить новость</h1><br>
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <p><input type="text" class="form-control" name="img" placeholder="Изображение" value="{{ old('img') }}">
                @error('img')
                <div class="alert alert-danger">
                    @foreach($errors->get('img') as $error)
                        <p>{{ $error }} </p>
                    @endforeach
                </div>
                @enderror
            </p>
            <p><input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger">
                    @foreach($errors->get('title') as $error)
                        <p>{{ $error }} </p>
                    @endforeach
                </div>
                @enderror
            </p>
            <p><input type="text" class="form-control" name="slug" placeholder="Слаг" value="{{ old('slug')  }}">
                @error('slug')
                <div class="alert alert-danger">
                    @foreach($errors->get('slug') as $error)
                        <p>{{ $error }} </p>
                    @endforeach
                </div>
                @enderror
            </p>
            <p><textarea class="form-control" name="description" placeholder="Текст">{!! old('description') !!}</textarea>
                @error('description')
                <div class="alert alert-danger">
                    @foreach($errors->get('description') as $error)
                        <p>{{ $error }} </p>
                    @endforeach
                </div>
                @enderror
            </p>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
@stop
