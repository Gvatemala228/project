<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title_tag')</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}" />
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    @yield('head_script')
</head>
<body>
<div class="wrapper">
<header>
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home')}}">Блог</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('posts.index')}}">Посты</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Категории
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(App\Models\Category::all() as $category)
                  <a class="dropdown-item" href="{{route('posts.category', $category->id)}}">{{$category->title}}</a>
                    @endforeach
                  </div>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                  <a class="nav-link" href="{{route('posts.create')}}">Добавить пост</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.index')}}">Профиль</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                </li>
                @endif
              </ul>
            <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Введите запрос" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
              </form>
            </div>
          </nav>    
    
</div>
</header>