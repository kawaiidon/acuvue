<?php
Route::get('vote', ['uses' => 'Controller@vote', 'as' => 'app.vote']);
Route::get('vote_twitor', ['uses' => 'Controller@vote_twitter', 'as' => 'app.vote_twitor']);
Route::get('votes_export', ['uses' => 'Controller@votes_export', 'as' => 'app.votes_export']);
Route::get('video_share/{id}', 'Controller@video_share');
Route::get('video_views/{id}', 'Controller@getVideoViews');

\Route::group(['prefix' => 'admin', 'middleware' => 'secure'], function() {

    $this->get('generator/{type}', ['uses' => 'AdminGenerator@index', 'as' => 'admin.generator.index']);
    $this->get('generator/{type}/create', ['uses' => 'AdminGenerator@create', 'as' => 'admin.generator.create']);
    $this->get('generator/{type}/{id}', ['uses' => 'AdminGenerator@edit', 'as' => 'admin.generator.edit']);
    $this->post('generator/{type}', ['uses' => 'AdminGenerator@store', 'as' => 'admin.generator.store']);
    $this->put('generator/{type}/{id}', ['uses' => 'AdminGenerator@update', 'as' => 'admin.generator.update']);
    $this->delete('generator/{type}/{id}', ['uses' => 'AdminGenerator@delete', 'as' => 'admin.generator.destroy']);

    $this->get('generator/{parent_type}/{parent_id}/{type}', ['uses' => 'AdminGenerator@related_index', 'as' => 'admin.generator.related_index']);
    $this->get('generator/{parent_type}/{parent_id}/{type}/create', ['uses' => 'AdminGenerator@related_create', 'as' => 'admin.generator.related_create']);
});
