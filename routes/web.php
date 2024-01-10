<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRecoController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobskillController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\UserrecomenderController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['employee']], function () {
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::resource('employee/skill', SkillController::class);
    Route::resource('employee/education', EducationController::class);
    Route::resource('employee/experience', ExperienceController::class);

    Route::get('employee/account', [EmployeeController::class, 'account'])->name('employee.account');

    Route::resource('employee/info', UserinfoController::class);

    Route::get('employee/jobs', [PagesController::class, 'job'])->name('employee.job');
    Route::get('employee/jobs/{id}', [PagesController::class, 'jobview'])->name('employee.job.view');

    Route::post('employee/application', [PagesController::class, 'application'])->name('employee.application.store');

    Route::get('employee/search', [PagesController::class, 'search'])->name('employee.job.search');
    Route::post('/employee/recommender', [EmployeeRecoController::class, 'index'])->name('employee.recommend');
   // Route::get('employee/jobview/{id}', [PagesController::class, 'jobview1'])->name('employee.recommend.view');

    Route::get('/employer/userprofile/{id}', [AdminController::class, 'userprofile'])->name('employee.userprofile');

});
Route::group(['middleware' => ['employer']], function () {
    Route::get('employer', [EmployerController::class, 'index'])->name('employer.index');

    Route::resource('employer/job', JobController::class);

    Route::get('employer/account', [EmployerController::class, 'account'])->name('employer.account');

    Route::resource('employer/jobskill', JobskillController::class)->except('index');

    Route::get('employer/skill/{id}', [JobskillController::class, 'index'])->name('job.skill');

    Route::post('/employer/recommender', [UserrecomenderController::class, 'index'])->name('employer.recommend');
    

    Route::get('/employer/userprofile/{id}', [AdminController::class, 'userprofile'])->name('employer.userprofile');

    Route::get('/employer/job/applications/{id}', [PagesController::class, 'applicationlist'])->name('employer.job.application');
    Route::get('/employer/job/readapplications/{id}', [PagesController::class, 'readapplicationlist'])->name('employer.job.readapplication');

    Route::patch('/employer/job/applications/update/{id}', [PagesController::class, 'applicationupdate'])->name('employer.job.application.update');
});

Route::group(['middleware' => ['employer']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::delete('/admin/job/{id}', [AdminController::class, 'removejob'])->name('admin.job.remove');
});