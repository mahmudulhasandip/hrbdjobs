<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
    return view('admin.dashboard');
})->name('home');


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

Route::get('country', 'AdminController\CountryController@index')->name('country.show');
