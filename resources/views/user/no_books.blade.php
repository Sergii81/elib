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
       
                    
           <div class="col-md-9">
            
            
            У Вас нет книг
           
        </div>
        
    </div>
</div>
@endsection
