@extends('layouts.main')
@section('title_tag')Редактирование данных профиля@endsection
@section('content_section')
<div class="container">
    <h1>Редактированние данных профиля</h1>
    <form action="" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"/>
        </div>
    </form>
    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif
    @if(session()->has('error'))
        {{session()->get('error')}}
    @endif
    @if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
    @endif
    <form action="{{route('profile.updatePassword', $user->id)}}" method="post">
        @csrf
        @method('put')
        <br>
        <h2>Изменить пароль</h2>
        <div>
            <label for="old_password" class="form-label">Старый пароль</label>
            <input type="password" class="form-control" id="old_password" name="old_password"/>
        </div>
        <br>
        <div>
            <label for="password" class="form-label">Новый пароль</label>
            <input type="password" class="form-control" id="password" name="password"/>
        </div>
        <br>
        <div>
            <label for="password_confirmation" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"/>
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-primary" value="Изменить" />
        </div>
    </form>
</div>
@endsection