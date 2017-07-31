<?php

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::resource('task', 'TasksController');
    });
});

Route::get('/', 'PagesController@index');
Route::get('/search', 'TasksController@search');
Route::get('/search_page', 'TasksController@searchResultsPage');
Route::get('/task_table', 'TasksController@getTasksTable');
