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
                    
                   
                </div>
            </div>
        </div>
        <div class="col-md-8">
                    
            <div class="col-md-8">                
               Описание книги             
            </div>
            
            <div class="col-md-8">                
                Заголовок {{$book->title}}                 
            </div> 
            <div class="col-md-8">                
                Автор {{$book->author}}                 
            </div> 
            <div class="col-md-8">
                <img src=".{{$book->url_picture}}" alt="" width="100px" height="150px">
            </div> 
            <div class="col-md-12">
                Краткое описание {{$book->legend}}
            </div> 
            <div class="col-md-5">  
            <form style="margin-top: 20px" action="{{route('bookUser')}}" method="POST" name="form" enctype="multipart/form-data" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="book_id"  value='{{$book->id}}'>
                    <input type="hidden" name="user_id"  value='{{Auth::user()->id}}'>
                </div>                
                    <input type="submit" class="btn btn-default" value="Взять книгу">
            </form>       
            </div>
        </div>
    </div>
</div>
@endsection
