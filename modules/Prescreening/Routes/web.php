<?php

Route::group(['prefix' => 'prescreening', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'PrescreeningController@index')->name('prescreening.index');
    Route::get('create', 'PrescreeningController@create')->name('prescreening.create');
    Route::post('/', 'PrescreeningController@store')->name('prescreening.store');
    Route::get('{id}/edit', 'PrescreeningController@edit')->name('prescreening.edit');
    Route::put('{id}', 'PrescreeningController@update')->name('prescreening.update');
    Route::delete('{id}', 'PrescreeningController@destroy')->name('prescreening.destroy');
});
