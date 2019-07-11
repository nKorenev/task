@extends('layout')

@section('content')
    <div class="uper">
    <div>
    <ul>
        <li> Название: {{$book->title}}</li>
        <li> Автор: {{$book->author}}</li>
        <li> Год: {{$book->year}}</li>
    </ul>
        <p>Жанры: </p>
    <ul style="list-style-type:none;">
        @foreach($book->genres as $genre)
            <li>{{$genre->name}}</li>
        @endforeach
    </ul>
    </div>
    </div>
@endsection
