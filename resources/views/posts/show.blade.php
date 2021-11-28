@extends('layouts.main')
@section('title_tag'){{$post->title}}@endsection
@section('content_section')
<div class="container">
    <div>
        Название поста: {{$post->title}}
    </div>
    <div>
        Текст поста: {{$post->content}}
    </div>
    <div>
        Картинка поста: {{$post->image}}
    </div>
    {{-- <div>
        Автор поста: {{$post->author}}
    </div> --}}
</div>
@endsection