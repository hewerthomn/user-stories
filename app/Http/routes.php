<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('lang/{locale}', 'HomeController@lang');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('profile', 'HomeController@profile');

    Route::resource('projects', 'ProjectsController');
    Route::resource('stories', 'StoriesController');
    Route::resource('scenarios', 'ScenariosController');
    Route::resource('bugs', 'BugsController');

    Route::get('p/{uid}', ['as' => 'projects.show', 'uses' => 'ProjectsController@show']);

    Route::get('s/create/{project_uid?}', ['as' => 'stories.create', 'uses' => 'StoriesController@create']);
    Route::get('s/{uid}/edit', ['as' => 'stories.edit', 'uses' => 'StoriesController@edit']);
    Route::put('s/{uid}', ['as' => 'stories.update', 'uses' => 'StoriesController@update']);
    Route::get('s/{uid}', ['as' => 'stories.show', 'uses' => 'StoriesController@show']);

    Route::get('s/{story_uid}/scenario/create', ['as' => 'scenarios.create', 'uses' => 'ScenariosController@create']);
    Route::get('s/{story_uid}/scenario/{id}/edit', ['as' => 'scenarios.edit', 'uses' => 'ScenariosController@edit']);
});
