@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="{{route('admin.index')}}">Книги</a></li>
                <li role="presentation"><a href="{{route('admin.create')}}">Добавить книгу</a></li>
                <li role="presentation"><a href="{{route('user.index')}}">Читатели</a></li>                    
                <li role="presentation"><a href="{{route('home')}}">В библиотеку</a></li>
             
            </ul>
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
                 <tr>
                        <th>Номер</th>
                        <th>Заголовок</th>
                        <th>Автор</th>
                        <th>Краткое содержание</th>                        
                        <th>файл</th> 
                        <th>Обложка</th>
                        <th>Управление</th>
                        <th>кто взял</th>
                    </tr>
                    @foreach ($all as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td> 
                        <td>{{$book->author}}</td>
                        <td>{{$book->legend}}</td>                        
                        <td>{{$book->url_text}}</td>
                        <td><img src="{{$book->url_picture}}" alt="" width="100px" height="150px"></td>
                        <td><!--<a href="{{route('admin.edit', $book->id)}}" class="btn btn-primary">Редактировать</a>-->
                        {{ Form::open(['route' => ['admin.destroy', $book->id], 'method' => 'delete']) }}
                        {{ Form::submit('Удалить', ['class'=> "btn btn-danger"])}}
                        {{ Form::close() }}</td> 
                        
                        <td>@foreach ($book->users as $user)
                           {{$user->fio}}
                        @endforeach</td>
                    </tr>
                    @endforeach
                </table>
            {{$all->links()}}
        </div>
        
    </div>
</div>

@endsection
