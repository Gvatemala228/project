@extends('layouts.main')
@section('title_tag')Создание поста@endsection
@section('content_section')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div>
        <label>Название поста</label>
        <input name="title" type="text">
    </div>
    <br>
    <div>
        <label>Текст поста</label>
        <textarea name="content"></textarea>
    </div>
    <br>
    <div>
        <label>Изображение-миниатюра</label>
        <input name="image" type="text">
    </div>

    <br>
    <input type="submit"/>
</form>
</div>
@endsection