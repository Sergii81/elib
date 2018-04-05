@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            
        </div>
        <div class="col-md-9">
            {!!Form::model($book, ['method' => 'patch', 'route' => ['admin.update' , $book->id]]])!!}            
                    
                <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input style="margin-left: 10px" type="text" name="title" id="title" value="{{$book->title}}">
                  <input type="hidden" name="id"  value='{{$book->id}}'>
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                  <input style="margin-left: 40px" type="text" name="author" id="author" value="{{$book->author}}">
                </div>
                <div class="form-group">
                  <label for="legend">Легенда</label>
                  <textarea id='legend' name='legend' class="form-control" rows="3">{{$book->legend}}</textarea>
                </div>
                
                <div class="form-group">
                  <label for="url_text">Добавить текст</label>
                  <input type="file" id="url_text" name='url_text'>
                  <p class="help-block">Редактировать файл</p>
                </div>
                <div class="form-group">
                  <label for="url_picture">Добавить обложку</label>
                  <input type="file" id="url_picture" name='url_picture'>
                  <p class="help-block">Редактировать файл</p>
                </div>
                <input type="submit" class="btn btn-default" value="Редактировать книгу">
              {!! Form::close() !!}
        </div>
        
    </div>
</div>

@endsection

