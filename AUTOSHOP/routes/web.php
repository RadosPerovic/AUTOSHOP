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

Route::get('/', 'PocetnaController@index')->name("routeGET");
Route::post('/', 'PocetnaController@pretraga')->name("pretraga");


Route::get('/kontakt', 'KontaktController@index')->name('kontakt');
Route::post('/kontakt/send', 'KontaktController@postIndex')->name('postKontakt')->middleware('auth');

Route::get('/onama', 'OnamaController@index')->name('onama');

//Route::get('/signup', 'RegistracijaController@getSignup')->name("autoshop.registracijaGET");
//Route::post('/signup', 'RegistracijaController@postSignup');


//Route::get('/signin', 'RegistracijaController@getSignin');
//Route::post('/signin', 'RegistracijaController@postSignin');



//Route::get('/user/profile', 'RegistracijaController@getUser')->name("user.profile");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::get('/home-admin', 'HomeController@indexAdmin')->name('homeAdmin');


Route::post('/korpa', 'CartController@add')->name('addCart')->middleware('auth');
Route::get('/korpa', 'CartController@index')->name('cart')->middleware('auth');
Route::post('/korpa/update/{id}', 'CartController@update')->name('updateCart');
Route::post('/korpa/naruci', 'CartController@order')->name('order');



Route::get('/user', 'RegistracijaController@getUser')->middleware('auth');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');


Route::get('/admin/add-article', 'AdminController@getAddArticle')->name('getAddArticle')->middleware('auth');
Route::post('/admin/add-article', 'AdminController@postAddArticle')->name('postAddArticle')->middleware('auth');

Route::post('/admin/edit/{id}', 'AdminController@edit')->name('editArticle')->middleware('auth');

Route::get('/admin/admins', 'AdminController@getAdmins')->name('getAdmins')->middleware('auth');
Route::get('/admin/users', 'AdminController@getUsers')->name('getUsers')->middleware('auth');

Route::get('/admin/add-user-admin', 'AdminController@getAddUserAdmin')->name('getAddUserAdmin')->middleware('auth');

Route::post('/admin/add-user-admin/add/admin' , 'AdminController@postAddUserAdmin')->name('postAddAdmin')->middleware('auth')->middleware('superadmin');
Route::post('/admin/add-user-admin/add/user' , 'AdminController@postAddUserAdmin')->name('postAddUser')->middleware('auth');

Route::post('/admin/add-user-admin/succes', 'AdminController@postAddUserAdmin')->name('postAddUserAdmin')->middleware('auth');
Route::post('/admin/edit/user/{id}', 'AdminController@editUser')->name('editUser')->middleware('auth');
Route::post('/admin/edit/admin/{id}', 'AdminController@editAdmin')->name('editAdmin')->middleware('auth')->middleware('superadmin');
