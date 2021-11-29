@extends('layouts.main')
@section('title_tag')Ваши посты@endsection
@section('content_section')
<div class="container">
    <h1>Ваши посты</h1>
    @foreach($posts as $post)
    <div><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>  | <a href="{{route('posts.edit',$post->id)}}">Редактировать</a></div>
    <br>
    @endforeach
</div>
@endsection