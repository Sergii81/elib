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
                    <a href="{{route('user_books')}}">Ваши книги</a>
                   
                </div>
            </div>
        </div>
        <div class="col-md-12">
                    
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
            <div class="col-md-8">
                {{File::get($book->url_text)}}
            </div> 
            
        </div>
    </div>
</div>
@endsection

