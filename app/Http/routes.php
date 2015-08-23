<?php

Route::get('/', 'ProjectsController@index');

Route::resource('projects', 'ProjectsController');
Route::resource('stories', 'StoriesController');
Route::resource('scenarios', 'ScenariosController');