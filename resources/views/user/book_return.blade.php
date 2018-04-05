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
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="{{route('user_books')}}">Ваши книги</a></li>
                        <li role="presentation"><a href="{{route('home')}}">К выбору книг</a></li>
                    </ul> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
                    
           Книга возвращена
        </div>
    </div>
</div>
@endsection

