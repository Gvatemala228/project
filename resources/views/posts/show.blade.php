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
    Автор поста: <a href=@if(Auth::check()) @if(Auth::user()->id==$post->author_id) {{route('profile.index')}} @endif @else {{route('profile.show',$post->author_id)}} @endif> {{$post->author->name}}</a>
    </div>
    {{-- <div>
        Автор поста: {{$post->author}}
    </div> --}}
    @if(Auth::check())
    @if(Auth::user()->id == $post->author->id)
    <div><a href="{{route('posts.edit',$post->id)}}">Редактировать</a></div>
    <div>
        <form method="post" action="{{route('posts.delete',$post->id)}}">
        @csrf
        @method('delete')
            <input type="submit" value="Удалить">
        </form>
        </div>
    @endif
    @endif
</div>
@endsection