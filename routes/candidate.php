<?php

Route::get('/', 'CandidateController\HomeController@dashboard')->name('main');
Route::get('/home', 'CandidateController\HomeController@dashboard')->name('home');

//
Route::get('/profile', 'CandidateController\ProfileController@getProfile')->name('profile');
Route::get('/profile/edit', 'CandidateController\ProfileController@getEditProfile')->name('profile.edit');
Route::post('/profile/basic/info', 'CandidateController\ProfileController@getBasicInfo');
Route::post('/profile/edit/basic', 'CandidateController\ProfileController@postUpdateBasicInfo')->name('update.profile.basic');

Route::post('/profile/education', 'CandidateController\ProfileController@getEducation');
Route::post('/profile/edit/education', 'CandidateController\ProfileController@postUpdateEducation')->name('update.profile.education');

Route::post('/profile/training', 'CandidateController\ProfileController@getTraining');
Route::post('/profile/edit/training', 'CandidateController\ProfileController@postUpdateTraining')->name('update.profile.training');

Route::post('/profile/experience', 'CandidateController\ProfileController@getExperience');
Route::post('/profile/edit/experience', 'CandidateController\ProfileController@postUpdateExperience')->name('update.profile.experience');

Route::post('/profile/certificate', 'CandidateController\ProfileController@getCertificate');
Route::post('/profile/edit/certificate', 'CandidateController\ProfileController@postUpdateCertificate')->name('update.profile.certificate');

//
Route::get('/applied/jobs', 'CandidateController\AppliedJobController@getAppliedJobs')->name('applied.jobs');

//
Route::get('/candidate/resume', 'CandidateController\ResumeController@getResume')->name('resume');

//
Route::get('/appropriate/job', 'CandidateController\AppropriateJobController@getAppropriateJob')->name('appropriate.job');

//
Route::get('/follow/companies', 'CandidateController\FollowCompanyController@getFollowCompanies')->name('follow.companies');

// shortlisted
Route::get('/shortlisted/job', 'CandidateController\ShortlistedController@getShortlistedJob')->name('shortlisted.job');
Route::post('/shortlisted/job/create', 'CandidateController\ShortlistedController@postShortlistedJob')->name('create.shortlisted.job');

