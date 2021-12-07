@extends('layouts.main')
@section('title_tag')Редактирование поста@endsection
@section('content_section')
<div class="container">
<form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div>
        <label for="title" class="form-label">Название поста</label>
        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$post->title}}" type="text">
        @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <div>
    <label class="form-label @error('category_id') is-invalid @enderror" for="category_id">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            <option disabled>Выберите категорию</option>
           @foreach($categories as $category)
        <option @if($post->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
           @endforeach
          </select>
        @error('category_id')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <div>
        <label for="content" class="form-label">Текст поста</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{$post->content}}</textarea>
        @error('content')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <div>
    <label for="image" class="form-label">Изображение-миниатюра</label>
    <input class="form-control @error('image') is-invalid @enderror" name="image" id="image" type="file">
    @error('image')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror    

</div>

    <br>
    <input class="btn btn-success" type="submit" value="Изменить"/>
</form>
</div>
@endsection