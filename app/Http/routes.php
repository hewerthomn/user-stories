<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'ProjectsController@index');

    Route::resource('projects', 'ProjectsController');
    Route::resource('stories', 'StoriesController');
    Route::resource('scenarios', 'ScenariosController');
});