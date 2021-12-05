<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'HomeController')->name('home');

Route::group(['namespace' => 'Posts'], function () {
    Route::get('/posts', 'IndexController')->name('posts.index');
    Route::get('/posts/search', 'SearchController')->name('posts.search');
    Route::get('/posts/create', 'CreateController')->name('posts.create')->middleware('auth');
    Route::post('/images', 'UploadImageController');
    Route::post('/posts/store', 'StoreController')->name('posts.store');
    Route::get('/posts/{post}', 'ShowController')->name('posts.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('posts.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('posts.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('posts.delete');
});
Route::group(['namespace' => 'Profile'], function () {
    Route::get('/profile', 'IndexController')->name('profile.index')->middleware('auth');
    Route::get('/profile/edit', 'EditController')->name('profile.edit')->middleware('auth');
    Route::patch('/profile/update', 'UpdateController')->name('profile.update')->middleware('auth');
    Route::put('/profile/edit/change_password/{id}', 'ChangePasswordController')->name('profile.updatePassword')->middleware('auth');
    Route::get('/profile/posts', 'PostsController')->name('profile.posts')->middleware('auth');
    Route::get('/profile/{id}', 'ShowController')->name('profile.show');
    Route::get('/profile/{id}/posts', 'UserPostsController')->name('profile.userPosts');
});
Auth::routes();
