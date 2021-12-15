@extends('layouts.main')
@section('title_tag'){{$post->title}}@endsection
@section('content_section')
<div class="container">
    <div>
        <h1 class="post-title">{{$post->title}}</h1>
    </div>
    <div>
        Категория: {{$post->category->title}}
    </div>
    <div>
        Автор поста: <a href=@if(Auth::check()) @if(Auth::user()->id==$post->author_id) {{route('profile.index')}} @else {{route('profile.show',$post->author_id)}} @endif @else {{route('profile.show',$post->author_id)}} @endif> {{$post->author->login}}</a>
    </div>
    <br>
    @if(Auth::check())
    @if(Auth::user()->id == $post->author->id)
    <div><a href="{{route('posts.edit',$post->id)}}" class="btn btn-dark">Редактировать</a></div>
    <br>
    <div>
        <form method="post" action="{{route('posts.delete',$post->id)}}">
        @csrf
        @method('delete')
            <input class="btn btn-danger" type="submit" value="Удалить">
        </form>
        </div>
    @endif
    @endif
    <br>
    <div class="post-content">
        Текст поста: {!!$post->content!!}
    </div>
    <div>
        <div class="comments">
            <h3 class="title-comments">Комментарии ({{count($post->comments)}})</h3>
            <div>
            <h5>Оставить комментарий</h5>
            <form method="post" action="{{route('comments.store', $post->id)}}">
                @csrf
                <textarea class="form-control w-50" name="comment"></textarea>
                <input type="submit" class="btn btn-primary my-3" value="Добавить">
            </form>
            <ul class="media-list">
              <!-- Комментарий (уровень 1) -->
              @foreach($post->comments as $comment)
              <li class="media my-3">
                <div class="media-body">
                  <div class="media-heading">
                  <div class="author"><a href="{{route('profile.show', $comment->author->id)}}">{{$comment->author->login}}</a></div>
                      <div class="metadata">
                        <span class="date">{{$comment->created_at->format('d.m.Y H:m:s')}}</span>
                        @if(Auth::check())@if(Auth::id()==$comment->author_id)<span><form method="post" action="{{route('comments.delete', $comment->id)}}">@csrf @method('delete') <input type="submit" class="btn btn-danger" value="Удалить"></form></span>@endif @endif
                      </div>
                    </div>
                <div class="media-text text-justify">{{$comment->comment}}</div>
                    <!-- Вложенный медиа-компонент (уровень 2) -->
                    {{-- <div class="media">
                      <div class="media-left">...</div>
                      <div class="media-body">
                        <div class="media-heading">...</div>
                        <div class="media-text text-justify">...</div>
                        <div class="footer-comment">...</div>
                        <!-- Вложенный медиа-компонент (уровень 3) -->
                        <div class="media">
                          ...                
                        </div><!-- Конец вложенного комментария (уровень 3) -->
                      </div>
                    </div><!-- Конец вложенного комментария (уровень 2) -->
                    <!-- Ещё один вложенный медиа-компонент (уровень 2) -->
                    <div class="media">
                      ...
                    </div><!-- Конец ещё одного вложенного комментария (уровень 2) --> --}}
                  </div>
              </li><!-- Конец комментария (уровень 1) -->
              @endforeach
            </ul>
          </div>
        </div>
    </div>
</div>
@endsection