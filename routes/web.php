<?php

#Admin Routes
Route::get('admin/login', 'AdminController@redirectToGoogle');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/callback', 'AdminController@handleGoogleCallback');
Route::get('admin/notice', 'AdminController@notice');
Route::get('admin', 'AdminController@index');
#Content Routes
Route::resource('admin/banners', 'BannersController');
Route::resource('admin/videos', 'VideosController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/posts', 'PostsController');
Route::resource('admin/questions', 'QuestionsController');
Route::resource('admin/contacts', 'ContactsController');
Route::resource('admin/modules', 'ModulesController');
Route::resource('admin/users', 'UsersController');
Route::resource('admin/tags', 'TagsController');
Route::resource('admin/comments', 'CommentsController');

Route::get('/', 'FrontendController@index');