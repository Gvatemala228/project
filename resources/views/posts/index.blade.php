@extends('layouts.main')
@section('title_tag')Все посты@endsection
@section('content_section')
<div class="container">
    @foreach($posts as $post)
    <div>
    <a href={{route('posts.show',$post->id)}}>{{$post->title}}</a>
    </div>
    {{-- </div> --}}
    {{-- {{$post->author}} --}}
    {{-- </div> --}}
    @endforeach
</div>
@endsection