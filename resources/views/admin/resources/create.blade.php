@extends('layouts.app')
@section('content')
    <div class="col-md-4  offset-2">
        <h1>Добавить источник новостей</h1><br>
        <form method="post" action="{{ route('resourses.store') }}" enctype="multipart/form-data">
            @csrf

            <p><input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">
                        @foreach($errors->get('title') as $error)
                            <p>{{ $error }} </p>
                        @endforeach
                    </div>
                @enderror
            </p>

            <p><input type="text" class="form-control" name="url" placeholder=" url источника" value="{{ old('url') }}">
                @error('url')
                    <div class="alert alert-danger">
                        @foreach($errors->get('url') as $error)
                            <p>{{ $error }} </p>
                        @endforeach
                    </div>
                @enderror
            </p>

                <button type="submit" class="btn btn-success">Добавить</button>
                </form>
                </div>
@stop



