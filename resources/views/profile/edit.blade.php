@extends('layouts.main')
@section('title_tag')Редактирование данных профиля@endsection
@section('content_section')
<div class="container">
    <h1>Редактированние данных профиля</h1>
    <form action="" method="post">
        @csrf
        @method('patch')
        <div>
            <label for="name">Имя </label>
            <input type="text" id="name" name="name" value="{{$user->name}}"/>
        </div>
        <div>
            <label for="email">Email </label>
            <input type="email" id="email" name="email" value="{{$user->email}}"/>
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
        <h2>Сменить пароль</h2>
        <div>
            <label for="old_password">Старый пароль</label>
            <input type="password" id="old_password" name="old_password"/>
        </div>
        <br>
        <div>
            <label for="password">Новый пароль</label>
            <input type="password" id="password" name="password"/>
        </div>
        <br>
        <div>
            <label for="password_confirmation">Повторите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation"/>
        </div>
        <br>
        <div>
            <input type="submit" value="Изменить" />
        </div>
    </form>
</div>
@endsection