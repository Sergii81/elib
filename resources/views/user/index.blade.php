@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="{{route('admin.index')}}">Книги</a></li>
                <li role="presentation"><a href="{{route('admin.create')}}">Добавить книгу</a></li>
                <li role="presentation" class="active"><a href="{{route('user.index')}}">Читатели</a></li>
                <li role="presentation"><a href="{{route('home')}}">В библиотеку</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
                 <tr>
                        <th>id</th>
                        <th>Login</th>
                        <th>ФИО</th>
                        <th>Номер телефона</th> 
                        <th>Уникальный номер</th>
                        <th>Email</th> 
                        <th>Примечания</th>
                        
                    </tr>
                    @foreach ($all as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->login}}</td> 
                        <td>{{$user->fio}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->uniq_num}}</td> 
                        <td>{{$user->email}}</td>
                        <td> @if($user->role_id == 1)                    
                                {{'admin'}}
                             @endif
                        </td>
                         
                    </tr>
                    @endforeach
                </table>
            
        </div>
        
    </div>
</div>

@endsection

