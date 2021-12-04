@extends('layouts.main')
@section('title_tag')Все посты@endsection
@section('content_section')
<div class="container">
    <div class="card-group">
    @foreach($posts as $post)
    <div class="col-sm-4 mb-3">
    <div class="card h-100">
    <a href={{route('posts.show',$post->id)}}><img class="card-img-top preview-image" src="{{asset('storage/'.$post->image)}}" alt=""></a>
    <div class="card-body">
    <a href={{route('posts.show',$post->id)}}><h5 class="card-title" href={{route('posts.show',$post->id)}}>{{$post->title}}</h5></a>
    <p>Автор: <a href="{{route('profile.show',$post->author->id)}}">{{$post->author->name}}</a></p>
    <p class="card-text"><small class="text-muted">{{$post->created_at->format('d/m/Y')}}</small></p>
    </div>
    </div>
</div>
    @endforeach
</div>
</div>
@endsection