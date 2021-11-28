<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title_tag')</title>
<link href="{{url('css/app.css')}}" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
<header>
<div class="container">
    <div class="nav">
        <nav>
            <a><h1>Блог</h1></a>
            <ul class="menu">
                <li class="nav__btn"><a href={{route('home')}}>Главная</a></li>
                <li class="nav__btn"><a href={{route('posts.index')}}>Посты</a></li>
                <li class="nav__btn"><a>Категории</a></li>
                @if(Auth::check())
                <li class="nav__btn"><a>Профиль</a></li>
                @else               
                <li class="nav__btn"><a href="{{route('login')}}">Авторизация</a></li>
                <li class="nav__btn"><a href="{{route('register')}}">Регистрация</a></li>
                @endif                
            </ul>
        </nav>
    </div>
</div>
</header>