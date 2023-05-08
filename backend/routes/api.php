<?php


use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\JobTypeApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// testing api
Route::middleware('auth:api')->get('/', function () {
    return "hi";
});

Route::prefix('admin')->namespace('App\Http\Controllers')->group(function () {

    // category route
    Route::resource('category', CategoryController::class);

    // job type route
    Route::resource('jobType', JobTypeController::class);

    // job post route
    Route::resource('jobPost',JobPostController::class);

    // company route
    Route::resource('company', CompanyController::class);

    // location route
    Route::resource('location',LocationController::class);

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
});
