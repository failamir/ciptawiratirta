<?php
use Illuminate\Support\Facades\Route;

Route::post('/report','CustomerReportController@report')->name('customer.report');
