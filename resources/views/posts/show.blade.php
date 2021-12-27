@extends('layouts.main')
@section('title_tag'){{$post->title}}@endsection
@section('head_script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
  $('#addCommentForm').on('submit',function (event){
    event.preventDefault();
    let commentsCount = Number($('.commentsCount').text());
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });    
    $.ajax({
      type: 'POST',
      url: '{{route('comments.store', $post->id)}}',
      data: $("#addCommentForm").serialize(),
      success: function(data){
      let author_href = `http://localhost:8000/profile/${data.author_id}`;
      let comment = data.comment;
      let author_login = data.author.login;
      let date = data.created_at;
              $('.media-list').prepend(`<li class='media my-3'><div class='media-body'>\
                  <div class='media-heading'>\
                  <div class='author'><a href="${author_href}">${author_login}</a></div>\
                      <div class='metadata'>\
                        <span class='date'>${date}</span>\
                        <span><form method="post" id="deleteCommentForm" action="http://localhost:8000/posts/comments/${data.id}">@csrf @method('delete') <input type="submit" class="btn btn-danger" id="delete_${data.id}" value="Удалить"></form></span>
                      </div>\
                    </div>\
                <div class='media-text text-justify'>${comment}</div>\
                  </div>\
              </li>`)
              $('.commentsCount').text(++commentsCount);
      },
      error: function(data){
        alert('Ошибка!');
        console.log(data);
      }
    });
  });
  $(document).on('click','#deleteCommentForm .btn',function(event){
    event.preventDefault();
    let comment_id = this.id.slice(7);
    let block = this;
    let commentsCount = Number($('.commentsCount').text());
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });
      $.ajax({
        type: 'DELETE',
        url: `http://localhost:8000/posts/comments/${comment_id}`,
        data: {id: comment_id},
        success: function(data){
          $(block).parents('.media').remove();
          $('.commentsCount').text(--commentsCount);
        },
      });
  });
});
</script>
@endsection
@section('content_section')
<div class="container">
  <div id="msg"></div>
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
            <h3 class="title-comments">Комментарии (<span class="commentsCount">{{count($post->comments)}}</span>)</h3>
            <div>
            <h5>Оставить комментарий</h5>
            <form method="post" id="addCommentForm" action="{{route('comments.store', $post->id)}}">
                @csrf
                <textarea class="form-control w-50 @guest h-100 @endguest" name="comment" @guest readonly @endguest>@guest Только для авторизированных @endguest</textarea>
                @auth<input type="submit" class="btn btn-primary my-3" id="submitComment" value="Добавить">@endauth
            </form>
            <ul class="media-list">
              <!-- Комментарий (уровень 1) -->
              @foreach($post->comments->reverse() as $comment)
              <li class="media my-3">
                <div class="media-body">
                  <div class="media-heading">
                  <div class="author"><a href="{{route('profile.show', $comment->author->id)}}">{{$comment->author->login}}</a></div>
                      <div class="metadata">
                        <span class="date">{{$comment->created_at->format('d.m.Y H:m:s')}}</span>
                      @if(Auth::check())@if(Auth::id()==$comment->author_id)<span><form method="post" id="deleteCommentForm" action="{{route('comments.delete', $comment->id)}}">@csrf @method('delete') <input type="submit" class="btn btn-danger" id="delete_{{$comment->id}}" value="Удалить"></form></span>@endif @endif
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