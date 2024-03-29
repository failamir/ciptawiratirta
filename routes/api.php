<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Testimoni
    Route::post('testimonis/media', 'TestimoniApiController@storeMedia')->name('testimonis.storeMedia');
    Route::apiResource('testimonis', 'TestimoniApiController');
});
