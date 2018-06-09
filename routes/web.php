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

Route::get('/', [							
	'as'	=> 'users.home',
	'uses'	=> 'UserController@index'
]);

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
  Route::post('/login', 'CandidateAuth\LoginController@login');
  Route::post('/logout', 'CandidateAuth\LoginController@logout')->name('candidate.logout');

  Route::get('/register', 'CandidateAuth\RegisterController@showRegistrationForm')->name('candidate.register');
  Route::post('/register', 'CandidateAuth\RegisterController@register');

  Route::post('/password/email', 'CandidateAuth\ForgotPasswordController@sendResetLinkEmail')->name('candidate.password.request');
  Route::post('/password/reset', 'CandidateAuth\ResetPasswordController@reset')->name('candidate.password.email');
  Route::get('/password/reset', 'CandidateAuth\ForgotPasswordController@showLinkRequestForm')->name('candidate.password.reset');
  Route::get('/password/reset/{token}', 'CandidateAuth\ResetPasswordController@showResetForm');
});
