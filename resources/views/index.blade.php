@extends('layout')

@section('content')
    <div class="uper">
        @if(session()->get('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div><br/>
        @endif
            <a href="/books/create" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Добавить книгу</a>
            <br/>
            <ol type="1">
            @foreach($books as $book)
                    <li>
                <ul>
                    <li> Название: {{$book->title}}</li>
                    <li> Автор: {{$book->author}}</li>
                    <li> Год: {{$book->year}}</li>
                </ul>
                    </li>
                    <form action="{{ route('books.show', $book->id)}}" method="post">
                        @csrf
                        @method('GET')
                        <button style="width:10%" type="submit" class="btn btn-primary btn-sm">Show</button>
                    </form>
                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="width:10%" type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                <br/>

            @endforeach
            </ol>
    </div>
@endsection
