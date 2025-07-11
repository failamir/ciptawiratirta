<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('candidate.candidate_route_prefix')], function () {
    Route::get('/' . config('candidate.candidate_category_route_prefix') . '/{slug}', 'CategoryController@index')->name('candidate.category.index');
    Route::get('/', 'CandidateController@index')->name('candidate.index'); // Candidates Page
    Route::get('/{slug}', 'CandidateController@detail')->name('candidate.detail'); // Detail
    Route::post('/contact/store', 'CandidateController@storeContact')->name("candidate.contact.store");
    Route::post('/prescreening', 'CandidateController@prescreening')->name("candidate.prescreening");
    Route::delete('/prescreening', 'CandidateController@prescreeningDelete')->name("candidate.prescreening.delete");
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/user/applied-jobs', 'ManageCandidateController@appliedJobs')->name('user.applied_jobs');
    Route::get('/user/my-applied/delete/{id}', 'ManageCandidateController@deleteJobApplied')->name('user.myApplied.delete');
    Route::get('/user/cv-manager', 'ManageCandidateController@cvManager')->name('user.candidate.cvManager');
    Route::post('/user/upload-cv', 'ManageCandidateController@uploadCv')->name('user.candidate.uploadCv');
    Route::post('/user/set-default-cv', 'ManageCandidateController@setDefaultCv')->name('user.candidate.setDefaultCv');
    Route::post('/user/delete-cv', 'ManageCandidateController@deleteCv')->name('user.candidate.deleteCv');

    Route::get('/user/candidate/profile', 'ProfileController@index')->name('user.candidate.index');
    Route::post('/user/candidate/profile/store', 'ProfileController@store')->name('user.candidate.store');
});
