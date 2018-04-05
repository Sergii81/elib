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
                    <a href="{{route('home')}}">К выбору книг</a>
                   
                </div>
            </div>
        </div>
       
                    
           <div class="col-md-12">
            @if ($books)
            <table class="table table-bordered">
                 <tr>
                        
                        <th>Заголовок</th>
                        <th>Автор</th>
                        <th>Краткое содержание</th>                        
                        <th>Читать</th> 
                        <th>Обложка</th>
                        <th>Управление</th>
                    </tr>
                    @foreach ($books as $book)
                    <tr>                        
                        <td>{{$book->title}}</td> 
                        <td>{{$book->author}}</td>
                        <td>{{$book->legend}}</td>                        
                        <td><a href="{{route('read', $book->id)}}" class="btn btn-info">Читать</td>
                        <td><img src="{{$book->url_picture}}" alt="" width="100px" height="150px"></td>
                        <td><a href="{{route('return', $book->id)}}" class="btn btn-danger">Вернуть</a>
                        </td> 
                    </tr>
                    @endforeach
                </table>
            @else У Вас нет книг
            @endif
        </div>
        
    </div>
</div>
@endsection
