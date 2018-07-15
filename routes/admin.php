<?php

// Route::get('/home', function () {
//     $users[] = Auth::user();
//     $users[] = Auth::guard()->user();
//     $users[] = Auth::guard('admin')->user();
//     return view('admin.dashboard');
// })->name('home');

// dashboard
Route::get('/home', 'AdminController\DashboardController@index')->name('home');

// employer list
Route::get('employer/list', 'AdminController\EmployerListController@index')->name('employerList.show');
Route::get('employer/list/approve/{empId}', 'AdminController\EmployerListController@approve')->name('employer.approve');
Route::get('employer/delete/{id}', 'AdminController\EmployerListController@deleteEmployer')->name('employer.delete');


// posted job list
Route::get('job/post/list', 'AdminController\jobPostedList@index')->name('job.post.list');
Route::get('job/post/approve/{jobId}', 'AdminController\jobPostedList@approve')->name('job.post.approve');

// Employer package list
Route::get('employer/package/list', 'AdminController\EmployerPackageList@index')->name('employer.package.list');
Route::post('employer/package/payment/', 'AdminController\EmployerPackageList@checkPayment')->name('employer.package.payment');
Route::get('employer/package/approve/{packageId}', 'AdminController\EmployerPackageList@approve')->name('employer.package.approve');

// Employer payment history
Route::get('employer/payment/history', 'AdminController\EmployerPaymentHistory@index')->name('employer.payment.history');


// job designation
Route::get('job_designation', 'AdminController\JobDesignationsController@index')->name('jobDesignation.show');
Route::post('job_designation', 'AdminController\JobDesignationsController@store')->name('jobDesignation.store');

// job category
Route::get('job_category', 'AdminController\JobCategoriesController@index')->name('jobCategories.show');
Route::post('job_category', 'AdminController\JobCategoriesController@store')->name('jobCategories.store');

// job Level
Route::get('job_level', 'AdminController\JobLevelsController@index')->name('jobLevels.show');
Route::post('job_level', 'AdminController\JobLevelsController@store')->name('jobLevels.store');

// job Experience
Route::get('job_experience', 'AdminController\JobExperiencesController@index')->name('jobExperience.show');
Route::post('job_experience', 'AdminController\JobExperiencesController@store')->name('jobExperience.store');

// job Packages
Route::get('job_packages', 'AdminController\JobPackagesController@index')->name('jobPackages.show');
Route::post('job_packages', 'AdminController\JobPackagesController@store')->name('jobPackages.store');

// job Packages
Route::get('featured_packages', 'AdminController\FeaturedPackagesController@index')->name('featuredPackages.show');
Route::post('featured_packages', 'AdminController\FeaturedPackagesController@store')->name('featuredPackages.store');

// Skill
Route::get('skills', 'AdminController\SkillsController@index')->name('skills.show');
Route::post('skills', 'AdminController\SkillsController@store')->name('skills.store');

// Route::get('country', 'AdminController\CountryController@index')->name('country.show');

// cv bank
Route::get('cvbank', 'AdminController\CvbankController@index')->name('cvbank');
