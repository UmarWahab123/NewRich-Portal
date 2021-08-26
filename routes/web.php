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
    return view('welcome');
});

Auth::routes();
Route::post('/userlogin', [App\Http\Controllers\Auth\LoginController::class, 'userlogin']);
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboards');
    // Role
    Route::get('/deleterole/{id}',[App\Http\Controllers\User\UserController::class, 'deleterole']);
    Route::get('roles', [App\Http\Controllers\User\UserController::class, 'roles'])->name('roles');
    Route::get('role/{id?}',[App\Http\Controllers\User\UserController::class, 'role']);
    Route::post('/saverole', [App\Http\Controllers\User\UserController::class, 'saverole']);
     //Users
    Route::get('/deleteuser/{id}', [App\Http\Controllers\User\UserController::class, 'deleteuser']);
    Route::get('users', [App\Http\Controllers\User\UserController::class, 'users'])->name('users');
    Route::get('user/{id?}', [App\Http\Controllers\User\UserController::class, 'user']);
    Route::post('/saveuser', [App\Http\Controllers\User\UserController::class, 'saveuser']);
    Route::post('/userstatus', [App\Http\Controllers\User\UserController::class, 'userstatus']);
    Route::get('/profile',[App\Http\Controllers\User\UserController::class, 'profile'] );
    //Personality
    Route::get('/personality/{id?}', [App\Http\Controllers\Test\PersonalityController::class, 'personality']);
    Route::get('/deletepersonality/{id}', [App\Http\Controllers\Test\PersonalityController::class, 'deletepersonality']);
    Route::get('/personalities', [App\Http\Controllers\Test\PersonalityController::class, 'personalities']);
    Route::post('/savepersonality', [App\Http\Controllers\Test\PersonalityController::class, 'savepersonality']);

    //Language
    Route::post('/savelanguage', 'Test\LanguageController@savelanguage');
    Route::get('/languages', 'Test\LanguageController@languages');
    Route::get('/deletelanguage/{id}', 'Test\LanguageController@deletelanguage');
    //Settings
      Route::get('/layoutmode', [App\Http\Controllers\Settings\SettingsController::class,'layoutmode']);
    Route::post('/savesettings', [App\Http\Controllers\Test\SettingsController::class,'savesettings']);
    // Route::post('/savequestion', [App\Http\Controllers\Test\SettingsController::class,'savequestion']);
    Route::post('/questionmodal',[App\Http\Controllers\Test\QuestionController::class,'questionmodal']);
    Route::post('/savequestion', [App\Http\Controllers\Test\QuestionController::class,'savequestion']);
    Route::get('/deletequestion/{id}',[App\Http\Controllers\Test\QuestionController::class, 'deletequestion']);
    Route::get('/setolddata', [App\Http\Controllers\Test\QuestionController::class, 'setolddata']);
    //lang settings
    Route::post('/savelangsettings', [App\Http\Controllers\Test\LanguageController::class, 'savelangsettings']);
    //Test
    Route::get('/maintest', [App\Http\Controllers\Test\TestController::class, 'maintest']);
    Route::get('/exportresults', [App\Http\Controllers\Test\TestController::class, 'exportresults']);
    Route::post('/exporttest', [App\Http\Controllers\Test\TestController::class, 'exporttest']);

    //Membership
     Route::get('/memberships', [App\Http\Controllers\Membership\MembershipController::class, 'memberships']);
    Route::get('/membership/{id?}', [App\Http\Controllers\Membership\MembershipController::class, 'membership']);
    Route::post('/savemembership', [App\Http\Controllers\Membership\MembershipController::class, 'savemembership']);
    Route::get('/deletemembership/{id}', [App\Http\Controllers\Membership\MembershipController::class, 'deletemembership']);


    //Settings
    Route::get('/settings', [App\Http\Controllers\Settings\SettingsController::class, 'settings']);
    Route::get('/setting/{id?}', [App\Http\Controllers\Membership\MembershipController::class, 'setting']);
    Route::post('/saveportalsettings', [App\Http\Controllers\Settings\SettingsController::class, 'saveportalsettings']);
    Route::get('/deletesetting/{id}', [App\Http\Controllers\Membership\MembershipController::class, 'deletesetting']);

    // ClassRooms
    Route::get('/classrooms', [App\Http\Controllers\Training\ClassroomController::class, 'classrooms']);
    Route::get('/classroom/{id?}', [App\Http\Controllers\Training\ClassroomController::class, 'classroom']);
    Route::post('/saveclassroom', [App\Http\Controllers\Training\ClassroomController::class, 'saveclassroom']);
    Route::get('/deleteclassroom/{id}', [App\Http\Controllers\Training\ClassroomController::class, 'deleteclassroom']);

    //Tutorials
    Route::get('/trainings/{type}', [App\Http\Controllers\Training\TutorialController::class, 'trainings']);
    Route::get('/training/{type}/{id?}', [App\Http\Controllers\Training\TutorialController::class, 'training']);
    Route::get('/trainingdetail/{id?}', [App\Http\Controllers\Training\TutorialController::class, 'trainingdetail']);
    Route::post('/savetraining', [App\Http\Controllers\Training\TutorialController::class, 'savetraining']);
    Route::get('/deletetraining/{id}', [App\Http\Controllers\Training\TutorialController::class, 'deletetraining']);
    Route::post('/upload_file', [App\Http\Controllers\Training\TutorialController::class, 'upload_file']);
    Route::post('/deletefiles', [App\Http\Controllers\Training\TutorialController::class, 'deletefiles']);
    //Lesson
    Route::post('/lessondetail', [App\Http\Controllers\Training\LessonController::class, 'lessondetail']);
    Route::post('/savelesson', [App\Http\Controllers\Training\LessonController::class, 'savelesson']);
    Route::get('/deletelesson/{id?}', [App\Http\Controllers\Training\LessonController::class, 'deletelesson']);
    Route::get('/page/{training_id}/{id?}', [App\Http\Controllers\Training\LessonController::class, 'page']);
});
