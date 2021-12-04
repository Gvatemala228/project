@extends('layouts.main')
@section('title_tag')Создание поста@endsection
@section('content_section')
<div class="container">
<div>
    <h1>Форма для создания поста</h1>
</div>
<br>
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div>
        <label class="form-label" for="title">Название поста</label>
        <input class="form-control" type="text" name="title" id="title">
    </div>
    <br>
    <div>
        <label class="form-label" for="content">Текст поста</label>
        <textarea class="form-control" name="content" id="content"></textarea>
    </div>
    <br>
    <div>
        <label class="form-label" for="image">Изображение-миниатюра</label>
        <input class="form-control" type="text" name="image" id="image">
    </div>

    <br>
    <input type="submit" class="btn btn-success" value="Добавить"/>
</form>
</div>
@endsection