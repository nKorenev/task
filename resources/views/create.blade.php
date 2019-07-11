@extends('layout')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Добавить книгу
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('books.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="title">Название :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="author">Автор :</label>
                    <input type="text" class="form-control" name="author"/>
                </div>
                <div class="form-group">
                    <label for="year">Год :</label>
                    <input type="number" class="form-control" name="year" min="1300" max="2030"/>
                </div>
                <div class="form-group">
                @foreach($genres as $genre)
                        <p><input type="checkbox" name="genres[]" value="{{$genre->id}}">{{$genre->name}}</p>
                @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection
