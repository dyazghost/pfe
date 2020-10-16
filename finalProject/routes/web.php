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
    return view('entrypage');
})->name('entrypage');

Route::get('/contact', 'ContactController@create')->name('contact');
Route::post('/contact', 'ContactController@store');


Auth::routes();//this line is provided by Laravel to handle different authenticationss


//register dashboard for all users
Route::prefix('register')->group(function () {
    
    Route::get('student', 'Auth\RegisterController@showStudentRegisterForm')->name('student-register');// showing a registration form for new students
    Route::post('student', 'Auth\RegisterController@createStudent');//listening for the new student info

    Route::get('instructor', 'Auth\RegisterController@showInstructorRegisterForm')->name('instructor-register');//showing a registration form for new instructor
    Route::post('instructor', 'Auth\RegisterController@createInstructor');//listening for the new instructor info

    Route::get('admin', 'Auth\RegisterController@showAdminRegisterForm')->name('admin-register');//showing a registration form for new admins
    Route::post('admin', 'Auth\RegisterController@createAdmin');//listening for the new admin info
    
});


//login dashboard for all type of users
Route::prefix('login')->group(function () {
    Route::get('student', 'Auth\LoginController@showStudentLoginForm')->name('student-login');//display a login form for students
    Route::post('student', 'Auth\LoginController@studentLogin');//check the student credentials with the DB
    
    Route::get('instructor', 'Auth\LoginController@showInstructorLoginForm')->name('instructor-login');//display a login form for instructors
    Route::post('instructor', 'Auth\LoginController@instructorLogin');//check the instructor credentials with the DB

    Route::get('admin', 'Auth\LoginController@showAdminLoginForm')->name('admin-login');//display a login form for admins
    Route::post('admin', 'Auth\LoginController@adminLogin');//check the admin credentials with the DB

    Route::get('student/forgot-password', 'Auth\ForgotPasswordController@getStudentEmail')->name('forgot-password-student');
    Route::post('student/forgot-password', 'Auth\ForgotPasswordController@postStudentEmail');

    Route::get('instructor/forgot-password', 'Auth\ForgotPasswordController@getInstructorEmail')->name('forgot-password-instructor');
    Route::post('instructor/forgot-password', 'Auth\ForgotPasswordController@postInstructorEmail');

    Route::get('admin/forgot-password', 'Auth\ForgotPasswordController@getAdminEmail')->name('forgot-password-admin');
    Route::post('admin/forgot-password', 'Auth\ForgotPasswordController@postAdminEmail');
    

});


//dashboard for INSTRUCTOR after successful login
Route::prefix('instructor')->middleware('auth:teacher')->group(function () {

    Route::get('', 'InstructorController@welcome')->name('logged-instructor');//welcome page for instructors

    Route::post('','InstructorController@show');// this is for the search bar

    Route::get('/index', 'InstructorController@index')->name('instructor-index');//this is for showing a list of all students

    Route::post('/{studentCode}','InstructorController@show');//this is for showing a single student

    Route::post('/{studentCode}','InstructorController@store');//this is for storing the grade

    Route::get('/{studentCode}','InstructorController@showfromindex')->name('target-student');//this is for showing a single student from the index page

    Route::get('/{studentCode}/detailed', 'InstructorController@showDetailedStudent')->name('instructor-student-overview-detailed');//display a single student

    Route::get('/{studentCode}/add-grade','InstructorController@create')->name('add-grade');// adding a grade for a specific student

});

//dashboard for STUDENT after successful login
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('', 'StudentController@index')->name('logged-student');//welcome page for students

    Route::post('','StudentController@show')->name('show-student');//listening for the search input

    //Route::get('/{code}', 'StudentController@show' )->name('student-grades');//showing a student grades for semesters and years


    //to send

    Route::get('/{code}/detailed', 'StudentController@showDetailed')->name('show-student-detailed');
    
});

//dashboard for ADMIN after successful login
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/', 'AdminController@welcome')->name('logged-admin'); // welcome page for admins   

    Route::get('/educator/index', 'AdminController@indexOfEducator')->name('educators-index');//showing a list of all Instructors

    Route::get('/student/index', 'AdminController@indexOfStudent')->name('students-index');//showing a list of all Students

    Route::get('/educator/create', 'AdminController@createEducator')->name('create-educator');//showing a form for creating a new Instructor

    Route::post('/educator', 'AdminController@storeEducator');//Listening for the previous form infomations

    Route::get('/student/create', 'AdminController@createStudent')->name('create-student');//showing a form for creating a new Student

    Route::post('/student', 'AdminController@storeStudent');//Listening for the previous form infomations

    Route::get('/student/{studentCode}/edit', 'AdminController@editStudent')->name('admin-edit-student');// displaying a form for editing an existing student

    Route::put('/student/{studentCode}/', 'AdminController@updateStudent');//listening for form info to update the student

    Route::delete('/student/{studentCode}/', 'AdminController@destroyStudent')->name('destroy-student');// deleting a student


    Route::get('/student/{studentCode}', 'AdminController@showStudent')->name('admin-student-overview');//display a single student

    Route::get('/student/{studentCode}/detailed', 'AdminController@showDetailedStudent')->name('admin-student-overview-detailed');//display a single student

    Route::get('/student/{studentCode}/add-grade', 'AdminController@addGrade')->name('admin-add-grade');//display a form for adding a grade to a given student
    
    Route::post('/student/{studentCode}/add-grade', 'AdminController@storeGrade');//Listening for the previous form info to come

    Route::get('/educator/{id}/edit', 'AdminController@editEducator')->name('admin-edit-educator');//display a form for editing an instructor

    Route::put('/educator/{id}/', 'AdminController@updateEducator');//Listening for the previous form info to update that instructor

    Route::delete('/educator/{id}/', 'AdminController@destroyEducator')->name('destroy-educator');//delete an instructor



    //to send to lamiaa
    Route::get('/content', 'AdminController@listContent')->name('list-content');

    Route::get('/content/branches/list', 'AdminController@listContentBranches')->name('content-list-branches');
    Route::get('/content/branches/create', 'AdminController@createBranch')->name('content-create-branch');
    Route::post('/content/branches/create', 'AdminController@storeBranch');
    Route::get('/content/branches/{branchID}/edit', 'AdminController@Editbranch')->name('edit-branch');
    Route::put('/content/branches/{branchID}', 'AdminController@updateBranch');
    Route::delete('/content/branches/{branchID}', 'AdminController@destroyBranch');

    Route::get('/content/subbranches/list', 'AdminController@listContentSubBranches')->name('content-list-subbranches');
    Route::get('/content/subbranches/create', 'AdminController@createSubBranch')->name('content-create-subbranch');
    Route::post('/content/subbranches/create', 'AdminController@storeSubBranch');
    Route::get('/content/subbranches/{subbranchID}/edit', 'AdminController@EditSubBranch')->name('edit-subbranch');
    Route::put('/content/subbranches/{subbranchID}', 'AdminController@updateSubBranch');
    Route::delete('/content/subbranches/{subbranchID}', 'AdminController@destroySubBranch');

    Route::get('/content/courses/list', 'AdminController@searchCourses')->name('content-search-courses');
    Route::post('/content/courses/list', 'AdminController@listCourses')->name('list-courses');
    Route::get('/content/courses/create', 'AdminController@createCourse')->name('create-course');
    Route::post('/content/courses/create', 'AdminController@storeCourse');
    Route::get('/content/courses/{courseID}/edit', 'AdminController@editCourse')->name('edit-course');
    Route::put('/content/courses/{courseID}', 'AdminController@updateCourse');
    Route::delete('/content/courses/{id}', 'AdminController@destroyCourse');

    Route::get('/content/diplomas', 'AdminController@listDiplomas')->name('list-diplomas');
    Route::get('/content/diplomas/{id}/edit', 'AdminController@editDiploma')->name('edit-diploma');
    Route::put('/content/diplomas/{id}', 'AdminController@updateDiploma');
    Route::delete('/content/diplomas/{id}', 'AdminController@destroyDiploma');




    
});



Route::get('/home', 'HomeController@index')->name('home');
