@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
             <ul class="nav nav-pills">
                <li role="presentation"><a href="{{route('admin.index')}}">Книги</a></li>
                <li role="presentation" class="active"><a href="{{route('admin.create')}}">Добавить книгу</a></li>
                <li role="presentation"><a href="{{route('user.index')}}">Читатели</a></li>                
                <li role="presentation"><a href="{{route('home')}}">В библиотеку</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <form style="margin-top: 20px" action="{{route('admin.store')}}" method="POST" name="form" enctype="multipart/form-data" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input style="margin-left: 10px" type="text" name="title" id="title" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                  <input style="margin-left: 40px" type="text" name="author" id="author" placeholder="Автор">
                </div>
                <div class="form-group">
                  <label for="legend">Легенда</label>
                  <textarea id='legend' name='legend' class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="url_text">Добавить текст</label>
                  <input type="file" id="url_text" name='url_text'>
                  <p class="help-block">Файл с текстом</p>
                </div>
                <div class="form-group">
                  <label for="url_picture">Добавить обложку</label>
                  <input type="file" id="url_picture" name='url_picture'>
                  <p class="help-block">Файл с обложкой</p>
                </div>
                <input type="submit" class="btn btn-default" value="Добавить книгу">
              </form>
            
        </div>
        
    </div>
</div>

@endsection
