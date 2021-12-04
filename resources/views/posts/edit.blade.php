@extends('layouts.main')
@section('title_tag')Редактирование поста: {{$post->title}}@endsection
@section('content_section')
<div class="container">
<form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div>
        <label for="title" class="form-label">Название поста</label>
        <input class="form-control" name="title" id="title" value="{{$post->title}}" type="text">
    </div>
    <br>
    <div>
        <label for="content" class="form-label">Текст поста</label>
        <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
    </div>
    <br>
    <div>
    <label for="image" class="form-label">Изображение-миниатюра</label>
    <input class="form-control" name="image" id="image" type="file">
    </div>

    <br>
    <input class="btn btn-success" type="submit" value="Изменить"/>
</form>
</div>
@endsection