<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/baca', function () {
    return view('welcome');
});

Route::get('/', 
// array asosiatif memintahkan bisnis logic ke kontroller
    [
    'uses' => 'BlogController@index',
    'as' => 'blog'
    ]
);

// Route::get('/blog/show', function () {
//     return view('blog.show');
// });

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);
