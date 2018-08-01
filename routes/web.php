<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

####################### comment out this code after uploading this project to server ####################
// Route::get('storage/uploads/{filename}', function ($filename)
// {
//     $path = storage_path('app/public/uploads/' . $filename);
//     // dd($path);
//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// });
####################### /comment out this code after uploading this project to server ####################

Route::get('/', [							
	'as'	  => 'users.home',
	'uses'	=> 'UserController@index'
]);

// job manupulate
Route::post('/recent/jobs', [
  'as'    => 'recent.jobs',
  'uses'  => 'JobController@recentJobs'
]);

Route::post('/similar/jobs/{id}', [
  'as'    => 'similar.jobs',
  'uses'  => 'JobController@similarJobs'
]);

Route::post('/featured/jobs', [
  'as'    => 'featured.jobs',
  'uses'  => 'JobController@featuredJobs'
]);

Route::post('/special/jobs', [
  'as'    => 'special.jobs',
  'uses'  => 'JobController@specialJobs'
]);

Route::post('/session/sorted_by', [
  'as'    => 'session.sort_by',
  'uses'  => 'BrowseJobController@postSortedBy'
]);

Route::post('/session/per_page', [
  'as'    => 'session.per_page',
  'uses'  => 'BrowseJobController@postPerPage'
]);

Route::resource('browse/jobs', 'BrowseJobController');

// single job view
Route::get('/job/{id}', [            
  'as'    => 'single.job',
  'uses'  => 'JobController@getSingleJob'
]);

// Company Info
Route::get('/company/{id}', [            
  'as'    => 'company.profile',
  'uses'  => 'CompaniesController@getCompanyProfile'
]);

// candidate profile
Route::get('/public/candidate/profile/{id}', [
  'as'    => 'public.candidate.profile',
  'uses'  => 'UserController@getCandidateProfile'
]);


// candidate resume
Route::get('/download/candidate/resume/{id}', [
  'as'    => 'candidate.download.resume',
  'uses'  => 'UserController@getCandidateResumePDF'
]);

// about and contact page
Route::get('about-us', [
  'as'    => 'about.us',
  'uses'  => 'UserController@getAboutUs'
]);

Route::get('contact-us', [
  'as'    => 'contact.us',
  'uses'  => 'UserController@getContactUs'
]);

#################################### Data Retrieve Through API
Route::get('/store/candidate/{per_page}/{page?}', [
  'as'    => 'candidate.store.api',
  'uses'  => 'AdminController\DataRetrieveController@getAllCandidate'
]);

Route::get('/store/job/category/all', [
  'as'    => 'jobcategory.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeAllCategories'
]);

Route::get('/store/job/designation/all', [
  'as'    => 'jobdesignation.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeAllDesignations'
]);

Route::get('/store/skills/all', [
  'as'    => 'skills.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeAllSkills'
]);

Route::get('/store/industries/all', [
  'as'    => 'industry.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeIndustries'
]);

Route::get('/store/resumes/all', [
  'as'    => 'resumes.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeResume'
]);

// employers retrieve
Route::get('/store/employers/all/{per_page}/{page?}', [
  'as'    => 'employers.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeEmployers'
]);

Route::get('/store/jobs/{per_page}/{page?}', [
  'as'    => 'jobs.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeJobs'
]);

Route::get('/store/applied/jobs/', [
  'as'    => 'applied.jobs.store.api',
  'uses'  => 'AdminController\DataRetrieveController@storeAppliedJobs'
]);

################### Get Country From API ###################### 
// Route::get('/country', [
//   'as'  => 'country',
//   'uses'  => 'AdminController\CountryController@storeCountryFromAPI'
// ]);

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

});


// industry routes
Route::middleware(['admin'])->group(function () {
  Route::group(['prefix' => 'admin'], function () {
      // industry routes
    Route::get('industry', 'AdminController\IndustryController@index')->name('industry.show');
    Route::post('industry', 'AdminController\IndustryController@store')->name('industry.store');
  });
});
 


Route::group(['prefix' => 'employer'], function () {
  
  Route::get('/login', 'EmployerAuth\LoginController@showLoginForm')->name('employer.login');
  Route::post('/login', 'EmployerAuth\LoginController@login');
  Route::post('/logout', 'EmployerAuth\LoginController@logout')->name('employer.logout');

  Route::get('/register', 'EmployerAuth\RegisterController@showRegistrationForm')->name('employer.register');
  Route::post('/register', 'EmployerAuth\RegisterController@register');

  Route::post('/password/email', 'EmployerAuth\ForgotPasswordController@sendResetLinkEmail')->name('employer.password.request');
  Route::post('/password/reset', 'EmployerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployerAuth\ForgotPasswordController@showLinkRequestForm')->name('employer.password.reset');
  Route::get('/password/reset/{token}', 'EmployerAuth\ResetPasswordController@showResetForm');

  Route::get('/email/verify/{token}', 'EmployerAuth\RegisterController@verifyUser')->name('mail.verify');
});
 // employer custom pages
Route::middleware(['employer'])->group(function () {
  Route::get('/post/new/job', 'EmployerController\HomeController@getNewJob')->name('employer.new.job');
});


Route::group(['prefix' => 'candidate'], function () {
  Route::get('/login', 'CandidateAuth\LoginController@showLoginForm')->name('candidate.login');
  Route::get('/login/gmail', 'CandidateAuth\LoginController@redirectToProvider')->name('candidate.login.gmail');
  Route::get('/login/gmail/callback', 'CandidateAuth\LoginController@handleProviderCallback')->name('candidate.login.gmail.callback');
  Route::post('/login', 'CandidateAuth\LoginController@login');
  Route::post('/logout', 'CandidateAuth\LoginController@logout')->name('candidate.logout');

  Route::get('/register', 'CandidateAuth\RegisterController@showRegistrationForm')->name('candidate.register');
  Route::post('/register', 'CandidateAuth\RegisterController@register');

  Route::post('/password/email', 'CandidateAuth\ForgotPasswordController@sendResetLinkEmail')->name('candidate.password.request');
  Route::post('/password/reset', 'CandidateAuth\ResetPasswordController@reset')->name('candidate.password.email');
  Route::get('/password/reset', 'CandidateAuth\ForgotPasswordController@showLinkRequestForm')->name('candidate.password.reset');
  Route::get('/password/reset/{token}', 'CandidateAuth\ResetPasswordController@showResetForm');

  Route::get('/email/verify/{token}', 'CandidateAuth\RegisterController@verifyCandidate');

  Route::post('/check/username', 'CandidateAuth\RegisterController@checkUsername');
});

// validation check

