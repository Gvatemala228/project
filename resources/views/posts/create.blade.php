@extends('layouts.main')
@section('title_tag')Создание поста@endsection
@section('content_section')
<div class="container">
    <div class="px-3">
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
        <label class="form-label @error('category_id') is-invalid @enderror" for="category_id">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            <option selected disabled>Выберите категорию</option>
           @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
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
</div>
@section('body_script')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea',
    height: 500,
    plugins: 'code table lists image media imagetools fullscreen paste',
    toolbar: 'insertfile undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | image',
    language: 'ru',
    images_upload_url: '/images',
    image_title: true,
    relative_urls : false,
    paste_as_text: true,
    branding: false,
    remove_script_host : false,
     images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/images');
        var token = '{{ csrf_token() }}';
        xhr.setRequestHeader("X-CSRF-Token", token);
        xhr.onload = function() {
        var json;
        if (xhr.status != 200) {
        failure('HTTP ошибка: ' + xhr.status);
        return;
        }
        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + json.responseText);
            console.log(json);
            return;
        }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
        }  
    });
tinymce.activeEditor.uploadImages(function(success) {
    $.post('/images', tinymce.activeEditor.getContent()).done(function() {
        console.log("Uploaded images and posted content as an ajax request.");
    });
});
  
</script>
@endsection
@endsection