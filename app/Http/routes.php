<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'ProjectsController@index');
    Route::get('profile', 'HomeController@profile');

    Route::resource('projects', 'ProjectsController');
    Route::resource('stories', 'StoriesController');
    Route::resource('scenarios', 'ScenariosController');
    Route::resource('bugs', 'BugsController');
});