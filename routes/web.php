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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/grades/create{id}', 'GradeController@create')->name('createGrade')->middleware('teacher');
Route::get('/candidates/show', 'CandidateController@show')->name('showCandidate');
Route::get('/company/show', 'CompanyController@show')->name('showCompany');
Route::get('/candidates/profile{id}', 'CandidateController@profile')->name('cvCandidate');
Route::get('/candidates/profile{id}/{jobId}', 'CandidateController@profile2')->name('cvCandidate2');
Route::get('/candidates', 'CandidateController@index')->name('allCandidates');
Route::post('/grades/store{id}', 'GradeController@store')->name('storeGrade')->middleware('teacher');
Route::post('jobs/search', 'JobController@search')->name('searchJob');
Route::get('/studentClasses/semiAnnualReport{id}', 'StudentClassesController@semiAnnualReport')->name('semiAnnualReport')->middleware('teacher');
Route::get('/studentClasses/annualReport{id}', 'StudentClassesController@annualReport')->name('annualReport')->middleware('teacher');
Route::get('/studentClasses/graduationRate{id}', 'StudentClassesController@graduationRate')->name('graduationRate')->middleware('teacher');
Route::get('/grades/addComment{id}', 'GradeController@addComment')->name('addComment')->middleware('student');
Route::post('/grades/storeComment/{id}', 'GradeController@storeComment')->name('storeComment')->middleware('student');
Route::post('/studentAnswers/store/{questionId}', 'StudentAnswerController@store')->name('storeStudentAnswer');
Route::post('/teacherAnswers/store/{studentAnswerId}', 'TeacherAnswerController@store')->name('storeTeacherAnswer');
Route::get('/candidateJobs/create/{jobId}', 'CandidateJobController@create')->name('createCandidateJob');
Route::get('/candidateJobs/showCandidates/{jobId}', 'CandidateJobController@showCandidates')->name('showCandidates');
Route::get('/teacherAnswers/create/{studentAnswerId}', 'TeacherAnswerController@create')->name('createTeacherAnswer');
Route::get('/admin', 'AdminController@index')->name('allUsers')->middleware('admin');
Route::post('/admin/filter', 'AdminController@filter')->name('filter')->middleware('admin');
Route::post('/questions/filter', 'QuestionController@filter')->name('filterQuestions');
Route::post('/articles/filter', 'ArticleController@filter')->name('filterArticles');
Route::any('/students/orderBy', 'StudentController@order')->name('orderStudents');
Route::post('/studentClasses/orderBy', 'StudentClassesController@order')->name('orderClasses');
Route::post('/subjects/orderBy', 'SubjectController@order')->name('orderSubjects');
Route::get('/students/change-password', 'StudentController@profile')->name('changePassword')->middleware('student');
Route::post('/students/save-password', 'StudentController@savePassword')->name('savePassword')->middleware('student');
//Route::get('/admin/editUser{user}', 'AdminController@edit')->name('editUser')->middleware('admin');
//Route::put('/admin/{user}', 'AdminController@update')->name('updateUser')->middleware('admin');


Route::resource('students', 'StudentController');//->except(['index']);
Route::resource('candidates', 'CandidateController');
Route::resource('companies', 'CompanyController');
Route::resource('teachers', 'TeacherController');
Route::resource('grades', 'GradeController');
Route::resource('studentClasses', 'StudentClassesController');
Route::resource('candidateJobs', 'CandidateJobController');
Route::resource('subjects', 'SubjectController');
Route::resource('questions', 'QuestionController');
Route::resource('articles', 'ArticleController');
Route::resource('jobs', 'JobController');
Route::resource('studentAnswers', 'StudentAnswerController');
Route::resource('candidateJobs', 'CandidateJobController');
Route::resource('teacherAnswers', 'TeacherAnswerController');
Route::resource('difference', 'DifferenceController');
Route::resource('admin', 'AdminController')->only([
    'index', 'edit', 'update'
]);
//Route::get('/students', 'StudentController@index')->name('students');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('students', 'StudentController');
    Route::resource('candidates', 'CandidateController');
    Route::resource('companies', 'CompanyController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('grades', 'GradeController');
    Route::resource('studentClasses', 'StudentClassesController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('questions', 'QuestionController');
    Route::resource('articles', 'ArticleController');
    Route::resource('jobs', 'JobController');
    Route::resource('studentAnswers', 'StudentAnswerController');
    Route::resource('candidateJobs', 'CandidateJobController');
    Route::resource('teacherAnswers', 'TeacherAnswerController');
    Route::resource('difference', 'DifferenceController');

});
Route::group(['middleware' => 'teacher'], function()
{
    Route::resource('students', 'StudentController')->only('store', 'create');
    Route::resource('teachers', 'TeacherController');
    Route::resource('grades', 'GradeController')->only('store', 'create');
    Route::resource('studentClasses', 'StudentClassesController')->only('store', 'create');
    Route::resource('subjects', 'SubjectController')->only('store', 'create');
    Route::resource('questions', 'QuestionController')->only('store', 'create');
    Route::resource('teacherAnswers', 'TeacherAnswerController');
});

Route::group(['middleware' => 'student'], function()
{
    Route::resource('studentAnswers', 'StudentAnswerController')->only('store', 'create');
    Route::resource('candidateJobs', 'CandidateJobsController')->only('store', 'create');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
