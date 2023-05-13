<?php


use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\JobPostApiController;
use App\Http\Controllers\Api\JobTypeApiController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */


Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:api')->prefix('admin')->namespace('App\Http\Controllers')->group(function () {

    // category route
    Route::post('category/search','CategoryController@search');
    Route::resource('category', CategoryController::class);

    // job type route
    Route::post('jobType/search','JobTypeController@search');
    Route::resource('jobType', JobTypeController::class);

    // job post route
    Route::resource('jobPost',JobPostController::class);

    // company route
    Route::post('company/search','CompanyController@search');
    Route::resource('company', CompanyController::class);

    // location route
    Route::post('location/search','LocationController@search');
    Route::resource('location',LocationController::class);

    // logout
    Route::post('logout','Auth\AuthController@logout');

});

Route::prefix('frontend')->name('frontend.')->group(function(){

    // category
    Route::prefix('category')->group(function () {
        Route::get('/',[CategoryApiController::class,'getAll'])->name('category.getAll');
    });
    Route::prefix('company')->group(function () {
        Route::get('/',[CompanyApiController::class,'getAll'])->name('company.getAll');
    });

    Route::prefix('jobType')->group(function(){
        Route::get('/',[JobTypeApiController::class,'getAll'])->name('jobType.getAll');
    });

    Route::prefix('jobPost')->group(function(){
        Route::get('/',[JobPostApiController::class,'getAllPosts'])->name('jobPost.getAll');
        Route::post('search',[JobPostApiController::class,'searchJob'])->name('jobPost.searchJob');
        Route::get('jobDetails/{id}',[JobPostApiController::class,'getJobPostDetails'])->name('jobPost.jobDetails');
    });
});
