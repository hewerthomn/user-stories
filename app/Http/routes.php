<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@dashboard');

    Route::resource('projects', 'ProjectsController');
    Route::resource('stories', 'StoriesController');
    Route::resource('scenarios', 'ScenariosController');
});