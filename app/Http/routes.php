<?php

Route::get('/', 'HomeController@dashboard');

Route::resource('projects', 'ProjectsController');
Route::resource('stories', 'StoriesController');
Route::resource('scenarios', 'ScenariosController');