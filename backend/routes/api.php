<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('register',[AuthController::class,'register'])->name('register');

Route::post('requestOTP', [EmailVerificationController::class, 'requestOTP'])->name('requestOTP');
Route::post('verifyOTP', [EmailVerificationController::class, 'verifyOTP'])->name('verifyOTP');

Route::middleware('auth:api')->prefix('admin')->namespace('App\Http\Controllers')->group(function () {

    // category route
    Route::post('category/search','CategoryController@search');
    Route::resource('category', CategoryController::class);

    // job type route
    Route::post('jobType/search','JobTypeController@search');
    Route::resource('jobType', JobTypeController::class);

    // job post route
    Route::post('jobPost/search','JobPostController@search')->name('jobPost.search');
    Route::resource('jobPost',JobPostController::class);

    // company route
    Route::post('company/search','CompanyController@search');
    Route::resource('company', CompanyController::class);

    // location route
    Route::post('location/search','LocationController@search');
    Route::resource('location',LocationController::class);


    // applicants route
    Route::resource('applicants',ApplicantController::class);

    // logout
    Route::post('logout','Auth\AuthController@logout');

});

Route::prefix('frontend')->name('frontend.')->namespace('App\Http\Controllers')->group(function(){

    // category
    Route::prefix('category')->group(function () {
        Route::get('/','Api\CategoryApiController@getAll')->name('category.getAll');
    });
    Route::prefix('company')->group(function () {
        Route::get('/','Api\CompanyApiController@getAll')->name('company.getAll');
    });

    Route::prefix('jobType')->group(function(){
        Route::get('/','Api\JobTypeApiController@getAll')->name('jobType.getAll');
    });

    Route::prefix('jobPost')->group(function(){
        Route::get('/','Api\JobPostApiController@getAllPosts')->name('jobPost.getAll');
        Route::post('search','Api\JobPostApiController@searchJob')->name('jobPost.searchJob');
        Route::middleware('auth:api')->get('jobDetails/{id}/{user_id}','Api\JobPostApiController@getJobPostDetails')->name('jobPost.jobDetails');
        Route::middleware('auth:api')->post('applyJobPost','Api\JobPostApiController@applyJobPost')->name('jobPost.apply');
    });

     // logout
     Route::middleware(['auth:api','verified'])->post('logout','Auth\AuthController@logout');
});
