@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Привет {{Auth::user()->fio}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->role_id == 1)
                    <a href="{{route('admin.index')}}">Управление</a>
                    @else <a href="{{route('user_books')}}">Ваши книги</a>
                    @endif
                   
                </div>
            </div>
        </div>
        <div class="col-md-12">
            Книги в библиотеке
            <table class="table table-bordered">
                 <tr>
                        
                        <th>Заголовок</th>
                        <th>Автор</th>
                        <th>Краткое содержание</th>  
                        <th>Обложка</th>
                        <th>Управление</th>
                    </tr>
                    @foreach ($all as $book)
                    <tr>                        
                        <td>{{$book->title}}</td> 
                        <td>{{$book->author}}</td>
                        <td>{{$book->legend}}</td> 
                        <td><img src="{{$book->url_picture}}" alt="" width="100px" height="150px"></td>
                        @if(Auth::user()->role_id == 1)
                    <td><a href="{{route('admin.index')}}">Управление</a></td>
                    @else <td>@if(Auth::user()->books->contains($book->id))
                                Книга взята
                                @else    <a href="{{route('takeBook', $book->id)}}" class="btn btn-primary">Взять книгу</a>
                               @endif
                    </td>
                    @endif                         
                    </tr>
                    @endforeach
                </table>
            {{$all->links()}}
        </div>
    </div>
</div>
@endsection
