@extends('layouts.main')
@section('title_tag')Ваш профиль@endsection
@section('content_section')
<div class="container">
    <div class="px-3">
    <h1>Ваш профиль</h1>
    <div>Логин: {{$user->login}}</div>
    <div>Имя: {{$user->name}}</div>
    <div>Фамилия: {{$user->surname}}</div>
    <div>Email: {{$user->email}}</div>
    <div><a href="{{route('profile.posts')}}">Ваши посты</a> | <a href="{{route('profile.edit')}}">Редактировать</a></div>
    <br>
    <form action="{{route('logout')}}" method="post">
    @csrf
        <input type="submit" class="btn btn-danger" value="Выйти"/>
    </form>
</div>
</div>
@endsection