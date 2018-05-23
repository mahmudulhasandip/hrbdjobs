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

// Skill
Route::get('skills', 'AdminController\SkillsController@index')->name('skills.show');
Route::post('skills', 'AdminController\SkillsController@store')->name('skills.store');