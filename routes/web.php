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


Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('/constructions', 'ConstructionsController');
    Route::get('/constructions/property/create', 'PropertyCreateController@createPropInCreate')->name('createPropInCreate');
    Route::post('/constructions/property', 'PropertyCreateController@storeProp')->name('storePropInCreate');
    Route::delete('/constructions/{const_id}/propertyconstruction/{id}', 'PropertyCreateController@deleteRelations');
    Route::delete('/constructions/{const_id}/images/{id}', 'ImagesController@destroy');
    Route::get('/constructions/{const_id}/property/create', 'PropertyCreateController@createPropInEdit')->name('createPropInEdit');
    Route::post('/constructions/{const_id}/property', 'PropertyCreateController@storeProp')->name('storePropInEdit');
    Route::get('/constructions/dist/get/{id}', 'DistController@getDistCreate');
    Route::get('/constructions/{const_id}/dist/get/{id}', 'DistController@getDistEdit');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/types', 'TypesController');
    Route::resource('/districts', 'DistrictsController');
    Route::resource('/cities', 'CitiesController');
    Route::resource('/properties', 'PropertiesController');
    Route::resource('/districts', 'DistrictsController');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'admin'], function () {
    Route::resource('/users', 'UsersController');
    Route::resource('/roles', 'RolesController');

});

