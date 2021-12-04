@extends('layouts.main')
@section('title_tag')Создание поста@endsection
@section('content_section')
<div class="container">
<div>
    <h1>Форма для создания поста</h1>
</div>
<br>
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <label class="form-label" for="title">Название поста</label>
        <input class="form-control @error('title') is-invalid @enderror" type="text" value="{{old('title')}}" name="title" id="title">
        @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <div>
        <label class="form-label" for="content">Текст поста</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{old('content')}}</textarea>
        @error('content')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <div>
        <label class="form-label" for="image">Изображение-миниатюра</label>
        <input class="form-control @error('image') is-invalid @enderror" type="file" value="{{old('image')}}" name="image" id="image">
        @error('image')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <input type="submit" class="btn btn-success" value="Добавить"/>
</form>
</div>
@endsection