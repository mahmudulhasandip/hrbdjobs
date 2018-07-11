<?php

Route::get('/home', 'EmployerController\HomeController@dashboard')->name('home');

// Route::get('/drafted/job', 'EmployerController\HomeController@getDraftedJob')->name('drafted.job');

// Route::get('/profile', 'EmployerController\HomeController@getProfile')->name('profile');

Route::get('/company/profile', 'EmployerController\HomeController@getCompanyProfile')->name('company.profile');
Route::get('/company/profile/edit', 'EmployerController\HomeController@getEditCompanyProfile')->name('company.profile.edit');
Route::get('/shortlisted/candidate', 'EmployerController\HomeController@getCandidateShortList')->name('shortlisted.candidate');
Route::get('/browse/candidate/resume', 'EmployerController\HomeController@getBrowseResume')->name('browse.candidate.resume');

// update company profile
Route::post('/company/profile/edit', 'EmployerController\HomeController@updateProfile')->name('update.profile');
// feature Company profile
Route::get('/company/profile/feature_company/{company_id}/{package_id}', 'EmployerController\HomeController@featureCompany')->name('feature.company');

// packages
Route::get('/package', 'EmployerController\HomeController@getPackages')->name('packages.list');
Route::get('/package/{id}', 'EmployerController\HomeController@purchasePackages')->name('packagesPurchase');
Route::get('/featured_package/{id}', 'EmployerController\HomeController@purchaseFeaturedPackages')->name('packagesFeaturedPurchase');
Route::post('/confirm_package', 'EmployerController\HomeController@confirmPackage')->name('confirmPackage');
Route::get('/package_history', 'EmployerController\HomeController@getPackagesHistory')->name('packages.history');

// job post
Route::get('/post/new/job', 'EmployerController\HomeController@getNewJob')->name('new.job');
Route::post('/post/new/job', 'EmployerController\HomeController@postJob')->name('new.post.job');
Route::get('/job_details/{id}', 'EmployerController\HomeController@jobDetails')->name('job.details');

Route::get('/manage/job', 'EmployerController\HomeController@getManageJob')->name('manage.job');
Route::get('/draft/job', 'EmployerController\HomeController@getDraftedJob')->name('draft.job');
Route::get('/post/new/job/{id}', 'EmployerController\HomeController@draftedJobForm')->name('draft.job.view');
Route::get('/edit/job/{id}', 'EmployerController\HomeController@editJobForm')->name('edit.job.view');
Route::get('/delete/job/{id}', 'EmployerController\HomeController@deleteJob')->name('delete.job');
Route::get('/job_pause/{id}', 'EmployerController\HomeController@pauseJob')->name('pause.job');

Route::post('/manage/job/feature_job', 'EmployerController\HomeController@featureJob')->name('feature.job');

Route::post('/get/job_cetegories', 'EmployerController\HomeController@getCategories')->name('getJobCetegories');
Route::post('/get/job_designations', 'EmployerController\HomeController@getDesignations')->name('getJobDesignations');

// applied candidates
Route::get('job/candidates/applied/{id}', 'EmployerController\AppliedController@getAppliedCandidatesList')->name('applied.candidates.list');
Route::get('/public/candidate/resume/{id}', [
    'as'    => 'public.candidate.resume',
    'uses'  => 'EmployerController\AppliedController@getCandidateResume'
  ]);

Route::post('job/candidates/applied/shortListed/', 'EmployerController\AppliedController@shortListCandidate')->name('applied.candidates.shortList');

// employer profile update
Route::get('/profile/edit', 'EmployerController\HomeController@getEditProfile')->name('profile.edit');
Route::post('/profile/edit', 'EmployerController\HomeController@updateEmployerProfile')->name('update.employer.profile');
Route::post('/profile/edit/password', 'EmployerController\HomeController@updateEmployerPassword')->name('update.employer.password');


