<?php

#Admin Routes
Route::get('admin/login', 'AdminController@redirectToGoogle');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/callback', 'AdminController@handleGoogleCallback');
Route::get('admin/notice', 'AdminController@notice');
Route::get('admin', 'AdminController@index');
#Content Routes
Route::get('admin/export/{content}', 'AdminController@export');

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
Route::resource('admin/stores', 'StoresController');
Route::resource('admin/orders', 'OrdersController');
Route::resource('admin/lands', 'LandsController');



Route::get('/', 'FrontendController@index');

Route::get('sitemap_index.xml', 'SitemapsController@index');

foreach (config('site.sitemap') as $content) {
    Route::get('sitemap_'.$content.'.xml', 'SitemapsController@'.$content);
}



Route::get('/landingpage', 'FrontendController@landing');
Route::get('/ajax_store', 'FrontendController@ajax_store');
Route::get('/chuyen-muc/{slug}', 'FrontendController@category');
Route::get('/lien-he', 'FrontendController@contact');
Route::get('/video/{slug?}', 'FrontendController@video');
Route::get('/hoi-dap/{slug?}', 'FrontendController@question');
Route::get('/phan-phoi/{slug?}', 'FrontendController@delivery');
Route::get('/tu-khoa/{slug}', 'FrontendController@tag');
Route::get('/tim-kiem', 'FrontendController@search');
Route::post('/saveContact', 'FrontendController@saveContact');
Route::post('/saveOrder', 'FrontendController@saveOrder');
Route::post('/saveLand', 'FrontendController@saveLand');
Route::get('/{slug}', 'FrontendController@post');