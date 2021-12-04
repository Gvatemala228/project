@extends('layouts.main')
@section('title_tag')Посты пользователя@endsection
@section('content_section')
<div class="container">
    <h1>Посты пользователя</h1>
    @foreach($posts as $post)
    <div><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></div>
    <br>
    @endforeach
</div>
@endsection