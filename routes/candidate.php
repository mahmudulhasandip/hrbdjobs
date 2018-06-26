<?php

Route::get('/', 'CandidateController\HomeController@dashboard');
Route::get('/home', 'CandidateController\HomeController@dashboard')->name('home');

//
Route::get('/profile', 'CandidateController\ProfileController@getProfile')->name('profile');
Route::get('/profile/edit', 'CandidateController\ProfileController@getEditProfile')->name('profile.edit');
Route::post('profile/edit', 'CandidateController\ProfileController@postEditProfile')->name('update.profile');

//
Route::get('/applied/jobs', 'CandidateController\AppliedJobController@getAppliedJobs')->name('applied.jobs');

//
Route::get('/candidate/resume', 'CandidateController\ResumeController@getResume')->name('resume');

//
Route::get('/appropriate/job', 'CandidateController\AppropriateJobController@getAppropriateJob')->name('appropriate.job');

//
Route::get('/follow/companies', 'CandidateController\FollowCompanyController@getFollowCompanies')->name('follow.companies');

