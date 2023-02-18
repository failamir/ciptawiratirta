<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Office
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::resource('offices', 'OfficeController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Sgp
    Route::delete('sgps/destroy', 'SgpController@massDestroy')->name('sgps.massDestroy');
    Route::post('sgps/parse-csv-import', 'SgpController@parseCsvImport')->name('sgps.parseCsvImport');
    Route::post('sgps/process-csv-import', 'SgpController@processCsvImport')->name('sgps.processCsvImport');
    Route::resource('sgps', 'SgpController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::post('jobs/media', 'JobsController@storeMedia')->name('jobs.storeMedia');
    Route::post('jobs/ckmedia', 'JobsController@storeCKEditorImages')->name('jobs.storeCKEditorImages');
    Route::resource('jobs', 'JobsController');

    // Ship
    Route::delete('ships/destroy', 'ShipController@massDestroy')->name('ships.massDestroy');
    Route::resource('ships', 'ShipController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Principal
    Route::delete('principals/destroy', 'PrincipalController@massDestroy')->name('principals.massDestroy');
    Route::post('principals/media', 'PrincipalController@storeMedia')->name('principals.storeMedia');
    Route::post('principals/ckmedia', 'PrincipalController@storeCKEditorImages')->name('principals.storeCKEditorImages');
    Route::resource('principals', 'PrincipalController');

    // Experience
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::resource('experiences', 'ExperienceController');

    // Departure
    Route::delete('departures/destroy', 'DepartureController@massDestroy')->name('departures.massDestroy');
    Route::resource('departures', 'DepartureController');

    // Interview
    Route::delete('interviews/destroy', 'InterviewController@massDestroy')->name('interviews.massDestroy');
    Route::resource('interviews', 'InterviewController');

    // Ship Experience
    Route::delete('ship-experiences/destroy', 'ShipExperienceController@massDestroy')->name('ship-experiences.massDestroy');
    Route::post('ship-experiences/media', 'ShipExperienceController@storeMedia')->name('ship-experiences.storeMedia');
    Route::post('ship-experiences/ckmedia', 'ShipExperienceController@storeCKEditorImages')->name('ship-experiences.storeCKEditorImages');
    Route::resource('ship-experiences', 'ShipExperienceController');

    // Hotel Experience
    Route::delete('hotel-experiences/destroy', 'HotelExperienceController@massDestroy')->name('hotel-experiences.massDestroy');
    Route::post('hotel-experiences/media', 'HotelExperienceController@storeMedia')->name('hotel-experiences.storeMedia');
    Route::post('hotel-experiences/ckmedia', 'HotelExperienceController@storeCKEditorImages')->name('hotel-experiences.storeCKEditorImages');
    Route::resource('hotel-experiences', 'HotelExperienceController');

    // Deck Certificates
    Route::delete('deck-certificates/destroy', 'DeckCertificatesController@massDestroy')->name('deck-certificates.massDestroy');
    Route::post('deck-certificates/media', 'DeckCertificatesController@storeMedia')->name('deck-certificates.storeMedia');
    Route::post('deck-certificates/ckmedia', 'DeckCertificatesController@storeCKEditorImages')->name('deck-certificates.storeCKEditorImages');
    Route::resource('deck-certificates', 'DeckCertificatesController');

    // Hotel Certificates
    Route::delete('hotel-certificates/destroy', 'HotelCertificatesController@massDestroy')->name('hotel-certificates.massDestroy');
    Route::post('hotel-certificates/media', 'HotelCertificatesController@storeMedia')->name('hotel-certificates.storeMedia');
    Route::post('hotel-certificates/ckmedia', 'HotelCertificatesController@storeCKEditorImages')->name('hotel-certificates.storeCKEditorImages');
    Route::resource('hotel-certificates', 'HotelCertificatesController');

    // Travel Documents
    Route::delete('travel-documents/destroy', 'TravelDocumentsController@massDestroy')->name('travel-documents.massDestroy');
    Route::post('travel-documents/media', 'TravelDocumentsController@storeMedia')->name('travel-documents.storeMedia');
    Route::post('travel-documents/ckmedia', 'TravelDocumentsController@storeCKEditorImages')->name('travel-documents.storeCKEditorImages');
    Route::resource('travel-documents', 'TravelDocumentsController');

    // Formal Education
    Route::delete('formal-educations/destroy', 'FormalEducationController@massDestroy')->name('formal-educations.massDestroy');
    Route::resource('formal-educations', 'FormalEducationController');

    // References
    Route::delete('references/destroy', 'ReferencesController@massDestroy')->name('references.massDestroy');
    Route::post('references/media', 'ReferencesController@storeMedia')->name('references.storeMedia');
    Route::post('references/ckmedia', 'ReferencesController@storeCKEditorImages')->name('references.storeCKEditorImages');
    Route::resource('references', 'ReferencesController');

    // Emergency Contact
    Route::delete('emergency-contacts/destroy', 'EmergencyContactController@massDestroy')->name('emergency-contacts.massDestroy');
    Route::resource('emergency-contacts', 'EmergencyContactController');

    // Next Of Kin
    Route::delete('next-of-kins/destroy', 'NextOfKinController@massDestroy')->name('next-of-kins.massDestroy');
    Route::post('next-of-kins/media', 'NextOfKinController@storeMedia')->name('next-of-kins.storeMedia');
    Route::post('next-of-kins/ckmedia', 'NextOfKinController@storeCKEditorImages')->name('next-of-kins.storeCKEditorImages');
    Route::resource('next-of-kins', 'NextOfKinController');

    // Testimoni
    Route::delete('testimonis/destroy', 'TestimoniController@massDestroy')->name('testimonis.massDestroy');
    Route::post('testimonis/media', 'TestimoniController@storeMedia')->name('testimonis.storeMedia');
    Route::post('testimonis/ckmedia', 'TestimoniController@storeCKEditorImages')->name('testimonis.storeCKEditorImages');
    Route::resource('testimonis', 'TestimoniController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
