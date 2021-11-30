@extends('layouts.main')
@section('title_tag')Редактирование данных профиля@endsection
@section('content_section')
<div class="container">
    <h1>Редактированние данных профиля</h1>
    <form action="" method="post">
        @csrf
        @method('patch')
        <div>
            <label for="name">Имя </label>
            <input type="text" id="name" name="name" value="{{$user->name}}"/>
        </div>
        <div>
            <label for="email">Email </label>
            <input type="email" id="email" name="email" value="{{$user->email}}"/>
        </div>
        <br>
        <h2>Сменить пароль</h2>
        <div>
            <label for="old_password">Старый пароль</label>
            <input type="text" id="old_password" name="old_password"/>
        </div>
        <br>
        <div>
            <label for="new_password">Новый пароль</label>
            <input type="password" id="new_password" name="new_password"/>
        </div>
        <br>
        <div>
            <label for="confirm_password">Повторите пароль</label>
            <input type="password" id="confirm_password" name="confirm_password"/>
        </div>
    </form>
</div>
@endsection