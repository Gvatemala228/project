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
    <div>
    Автор поста: {{$post->author->name}}
    </div>
    {{-- <div>
        Автор поста: {{$post->author}}
    </div> --}}

    <div><a href="{{route('posts.edit',$post->id)}}">Редактировать</a></div>
    <div>
        <form method="post" action="{{route('posts.delete',$post->id)}}">
        @csrf
        @method('delete')
            <input type="submit" value="Удалить">
        </form>
        </div>
</div>
@endsection