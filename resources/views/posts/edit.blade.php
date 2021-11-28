@extends('layouts.main')
@section('title_tag')Редактирование поста: {{$post->title}}@endsection
@section('content_section')
<div class="container">
<form method="post" action="{{route('posts.update',$post->id)}}">
    @csrf
    @method('patch')
    <div>
        <label>Название поста</label>
    <input name="title" value="{{$post->title}}" type="text">
    </div>
    <br>
    <div>
        <label>Текст поста</label>
        <textarea name="content">{{$post->content}}</textarea>
    </div>
    <br>
    <div>
        <label>Изображение-миниатюра</label>
    <input name="image" value="{{$post->image}}" type="text">
    </div>

    <br>
    <input type="submit"/>
</form>
</div>
@endsection