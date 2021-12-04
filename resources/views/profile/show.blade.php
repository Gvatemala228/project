@extends('layouts.main')
@section('title_tag')Профиль пользователя {{$user->id}}@endsection
@section('content_section')
<div class="container">
    <h1>Профиль пользователя {{$user->id}}</h1>
    {{-- <div>Логин: {{$user->login}}</div> --}}
    <div>Имя: {{$user->name}}</div>
    {{-- <div>Фамилия: {{$user->surname}}</div> --}}
    <div>Email: {{$user->email}}</div>
    <div><a href="{{route('profile.userPosts', $user->id)}}">Посты</a></div>
    <br>
</div>
@endsection