<?php

Route::get('/', 'CandidateController\HomeController@dashboard')->name('main');
Route::get('/home', 'CandidateController\HomeController@dashboard')->name('home');

//
Route::get('/profile', 'CandidateController\ProfileController@getProfile')->name('profile');
Route::get('/profile/edit', 'CandidateController\ProfileController@getEditProfile')->name('profile.edit');
Route::post('/profile/basic/info', 'CandidateController\ProfileController@getBasicInfo');
Route::post('/profile/edit/basic', 'CandidateController\ProfileController@postUpdateBasicInfo')->name('update.profile.basic');

// change password
Route::get('/profile/change/password/', 'CandidateController\ProfileController@changePassword')->name('change.password');
Route::post('/profile/change/password/', 'CandidateController\ProfileController@updatePassword')->name('update.password');


Route::post('/profile/education', 'CandidateController\ProfileController@getEducation');
Route::post('/profile/edit/education', 'CandidateController\ProfileController@postUpdateEducation')->name('update.profile.education');

Route::post('/profile/training', 'CandidateController\ProfileController@getTraining');
Route::post('/profile/edit/training', 'CandidateController\ProfileController@postUpdateTraining')->name('update.profile.training');

Route::post('/profile/experience', 'CandidateController\ProfileController@getExperience');
Route::post('/profile/edit/experience', 'CandidateController\ProfileController@postUpdateExperience')->name('update.profile.experience');

Route::post('/profile/certificate', 'CandidateController\ProfileController@getCertificate');
Route::post('/profile/edit/certificate', 'CandidateController\ProfileController@postUpdateCertificate')->name('update.profile.certificate');

//
Route::get('/applied/job/{id}', 'CandidateController\AppliedJobController@applyJob')->name('apply.job');
Route::get('/applied/jobs', 'CandidateController\AppliedJobController@getAppliedJobs')->name('applied.jobs');
Route::post('/applied/job/withdraw', 'CandidateController\AppliedJobController@postWithdrawAppliedJob')->name('applied.jobs.withdraw');

//
Route::get('/resume', 'CandidateController\ResumeController@getResume')->name('resume.view');
Route::get('/resume/upload', 'CandidateController\ResumeController@getUploadResume')->name('resume.upload');
Route::get('/uploaded/resume/view', 'CandidateController\ResumeController@getUploadedResumeView')->name('uploaded.resume.view');
Route::post('/resume/upload', 'CandidateController\ResumeController@postUploadResume')->name('post.resume.upload');

//
Route::get('/appropriate/job', 'CandidateController\AppropriateJobController@getAppropriateJob')->name('appropriate.job');

//
Route::get('/follow/company/{company_id}', 'CandidateController\FollowCompanyController@followCompany')->name('follow.company');
Route::get('/follow/companies', 'CandidateController\FollowCompanyController@getFollowCompanies')->name('follow.companies');
Route::post('/follow/company/status/change', 'CandidateController\FollowCompanyController@postFollowCompanyStatus')->name('follow.company.status');

// shortlisted
Route::get('/shortlisted/job', 'CandidateController\ShortlistedController@getShortlistedJob')->name('shortlisted.job');
Route::post('/shortlisted/job/create', 'CandidateController\ShortlistedController@postShortlistedJob')->name('create.shortlisted.job');

