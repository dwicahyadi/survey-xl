<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return \App\Models\Question::with('answers')->get();
//    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::view('/profile','profile')->name('profile');

Route::prefix('manage/')->group(function (){

    Route::get('/cluster',[\App\Http\Controllers\ClusterController::class,'index'])->name('cluster.index');
    Route::prefix('dealer')->name('dealer.')->group(function (){
        Route::get('/',[\App\Http\Controllers\DealerController::class,'index'])->name('index');
        Route::get('/{dealer}/manage',[\App\Http\Controllers\DealerController::class,'show'])->name('manage');
        Route::get('/{dealer}/user',[\App\Http\Controllers\DealerUserController::class,'index'])->name('user');
        Route::get('/{dealer}/outlet',[\App\Http\Controllers\DealerOutletController::class,'index'])->name('outlet');
        Route::get('/{dealer}/outlet/import',[\App\Http\Controllers\DealerOutletController::class,'import'])->name('outlet.import');

        Route::delete('user/{user}/delete',[\App\Http\Controllers\DealerUserController::class,'destroy'])->name('user.delete');

    });

    Route::prefix('survey-question')->name('survey-question.')->group(function (){
        Route::get('/',[\App\Http\Controllers\SurveyQuestionController::class,'index'])->name('index');
        Route::get('/{section}/create-question',[\App\Http\Controllers\SurveyQuestionController::class,'create'])->name('create-question');
    });
});

Route::prefix('report')->name('report.')->group(function (){
    Route::get('/summary/',[\App\Http\Controllers\SurveySummaryController::class,'index'])->name('summary');
    Route::get('/list/',[\App\Http\Controllers\SurveySummaryController::class,'list'])->name('list');
    Route::get('/export/',[\App\Http\Controllers\SurveySummaryController::class,'exportDetail'])->name('export');
    Route::get('/pivot/',[\App\Http\Controllers\SurveySummaryController::class,'pivot'])->name('pivot');

    Route::get('/list/from_outlet/{outlet}',[\App\Http\Controllers\SurveySummaryController::class,'fromOutlet'])->name('list.from-outlet');
    Route::get('/list/from_surveyor/{user}',[\App\Http\Controllers\SurveySummaryController::class,'fromUser'])->name('list.from-user');
});

Route::prefix('setting')->name('setting.')->group(function (){
    Route::get('/settings/',[\App\Http\Controllers\SettingController::class,'index'])->name('index');
    Route::get('/user/',[\App\Http\Controllers\UserSettingController::class,'index'])->name('user');
    Route::get('/role/',[\App\Http\Controllers\RoleSettingController::class,'index'])->name('role');

    Route::delete('/delete_old_upload_image',[\App\Http\Controllers\SettingController::class,'deleteOldUploadedImage'])->name('delete.old-uploaded-image');
    Route::delete('/delete_all_upload_image',[\App\Http\Controllers\SettingController::class,'deleteAllUploadedImage'])->name('delete.all-uploaded-image');
    Route::delete('/delete_old_survey',[\App\Http\Controllers\SettingController::class,'deleteOldSurvey'])->name('delete.old-surveys');
    Route::delete('/delete_all_survey',[\App\Http\Controllers\SettingController::class,'deleteAllSurvey'])->name('delete.all-surveys');
    Route::delete('/delete_all_questions',[\App\Http\Controllers\SettingController::class, 'deleteAllQuestions'])->name('delete.all-questions');
    Route::delete('/delete_all_dealers',[\App\Http\Controllers\SettingController::class,'deleteAllDealers'])->name('delete.all-dealers');
});




/*Surveyor*/
Route::prefix('surveyor/')->name('surveyor.')->group(function (){
    Route::get('/', [\App\Http\Controllers\SurveyController::class,'index'])->name('index');
    Route::get('/new-survey', [\App\Http\Controllers\SurveyController::class,'create'])->name('new-survey');
    Route::get('/{outlet}/do-survey', [\App\Http\Controllers\SurveyController::class,'doSurvey'])->name('do-survey');
    Route::get('/list', [\App\Http\Controllers\SurveyController::class,'surveyList'])->name('list');
    Route::get('/show/{id}', [\App\Http\Controllers\SurveyController::class,'showSurvey'])->name('show');


});


