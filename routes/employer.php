<?php

Route::get('/home', 'EmployerController\HomeController@dashboard')->name('home');

Route::get('/drafted/job', 'EmployerController\HomeController@getDraftedJob')->name('drafted.job');
Route::get('/manage/job', 'EmployerController\HomeController@getManageJob')->name('manage.job');
// Route::get('/profile', 'EmployerController\HomeController@getProfile')->name('profile');
Route::get('/profile/edit', 'EmployerController\HomeController@getEditProfile')->name('profile.edit');
Route::get('/company/profile', 'EmployerController\HomeController@getCompanyProfile')->name('company.profile');
Route::get('/company/profile/edit', 'EmployerController\HomeController@getEditCompanyProfile')->name('company.profile.edit');
Route::get('/shortlisted/candidate', 'EmployerController\HomeController@getCandidateShortList')->name('shortlisted.candidate');
Route::get('/browse/candidate/resume', 'EmployerController\HomeController@getBrowseResume')->name('browse.candidate.resume');

// update company profile
Route::post('/company/profile/edit', 'EmployerController\HomeController@updateProfile')->name('update.profile');

// packages
Route::get('/package', 'EmployerController\HomeController@getPackages')->name('packages.list');
Route::get('/package/{id}', 'EmployerController\HomeController@purchasePackages')->name('packagesPurchase');
Route::get('/featured_package/{id}', 'EmployerController\HomeController@purchaseFeaturedPackages')->name('packagesFeaturedPurchase');
Route::post('/confirm_package', 'EmployerController\HomeController@confirmPackage')->name('confirmPackage');
Route::get('/package_history', 'EmployerController\HomeController@getPackagesHistory')->name('packages.history');

// post
Route::get('/post/new/job', 'EmployerController\HomeController@getNewJob')->name('new.job');



