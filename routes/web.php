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

Auth::routes();

// Blog
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

//HomeController
Route::get('/contact', 'HomeController@getContact');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/how_to_use', 'HomeController@getHowtouse');
Route::get('autocomplete', 'HomeController@autocomplete')->name('autocomplete');

Route::resource('posts_user', 'PostuserController');
//Post
Route::resource('posts', 'PostController');

//users
Route::get('/users/profile/{id}', 'UserController@show')->name('user.profile');

//logut users
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

///////Route : Admin  ////////////////

	Route::prefix('admin')->group(function() {
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Password reset routes-
		Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	});

//categories
Route::resource('categories', 'CategoryController',['except' => ['create']]);

Route::resource('tags', 'TagController',['except' => ['create']]);

//comment
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store'])->name('comments.store');
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit'])->name('comments.edit');
Route::put('comments/{id}', ['uses' => 'CommentsController@update_admin'])->name('comments.update_admin');
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy'])->name('comments.destroy');
Route::get('comment/{id}/delete', 'CommentsController@delete')->name('comments.delete');

Route::get('/', function () {
    return redirect('/home');
});


//Route::get('/home', 'HomeController@index')->name('home');
