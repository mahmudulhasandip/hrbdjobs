<?php

Route::get('/home', 'EmployerController\HomeController@dashboard')->name('home');
Route::get('/post/new/job', 'EmployerController\HomeController@getNewJob')->name('new.job');
Route::get('/drafted/job', 'EmployerController\HomeController@getDraftedJob')->name('drafted.job');
Route::get('/manage/job', 'EmployerController\HomeController@getManageJob')->name('manage.job');
Route::get('/profile', 'EmployerController\HomeController@getProfile')->name('profile');
Route::get('/profile/edit', 'EmployerController\HomeController@getEditProfile')->name('profile.edit');
Route::get('/company/profile', 'EmployerController\HomeController@getCompanyProfile')->name('company.profile');
Route::get('/company/profile/edit', 'EmployerController\HomeController@getEditCompanyProfile')->name('company.profile.edit');
Route::get('/shortlisted/candidate', 'EmployerController\HomeController@getCandidateShortList')->name('shortlisted.candidate');
Route::get('/browse/candidate/resume', 'EmployerController\HomeController@getBrowseResume')->name('browse.candidate.resume');

