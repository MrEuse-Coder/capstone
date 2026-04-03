<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\AuthAdmin\register;
use App\Http\Controllers\ClassBatchController;
use App\Http\Controllers\Dashboard\Accounts;
use App\Http\Controllers\Dashboard\Batch;
use App\Http\Controllers\Dashboard\EvaluationTemplate;
use App\Http\Controllers\Dashboard\StudentsProfile;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dev\Registration;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SuperAdmin\SuperadminAccountController;
use App\Http\Controllers\SuperAdmin\SuperadminDashboard;
use App\Http\Controllers\SuperAdmin\SuperadminSubjectController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/class_batch');
    }
    return redirect('/login');
});

Route::middleware(['restore.superadmin'])->group(function () {
    //---------SUPER ADMIN----------------

    Route::get('/superadmin/home', [SuperAdminController::class, 'index'])
        ->middleware('super_admin', 'restore.superadmin');

    Route::get('/impersonate/{id}', [SuperAdminController::class, 'impersonate'])
        ->name('impersonate');

//---------------SUPER ADMIN DASHBOARD--------------------------
    Route::get('/dashboard/superadmin', [SuperadminDashboard::class, 'index'])
        ->middleware('super_admin');

    Route::get('/accounts/superadmin', [SuperadminAccountController::class, 'index'])
        ->middleware('super_admin');

    Route::get('/campus_subjects/superadmin', [SuperadminSubjectController::class, 'index'])
        ->middleware('super_admin');
});

Route::get('/stop-impersonation', [SuperAdminController::class, 'stopImpersonation'])
    ->name('stop.impersonation');


//---------------------------------------------------------------------------------
//class_batch controller
Route::get('/class_batch', [ClassBatchController::class, 'index'])
    ->middleware('admin');
Route::get('/class_batch/create', [ClassBatchController::class, 'create'])
    ->middleware('admin');
Route::post('/class_batch', [ClassBatchController::class, 'store'])
    ->middleware('admin');
Route::delete('/class_batch/{class_batch}', [ClassBatchController::class, 'destroy'])
    ->middleware('admin');

//students-profile controller
Route::get('/class_batch/students/{class_batch}', [StudentController::class, 'index'])
    ->name('class_batch_students.index')
    ->middleware('auth');
Route::get('/class_batch/students/{class_batch}/create', [StudentController::class, 'create'])
    ->middleware('auth');
Route::post('/class_batch/students/{class_batch}', [StudentController::class, 'store'])
    ->middleware('auth');
Route::delete('/class_batch/students/{student}', [StudentController::class, 'destroy'])
    ->middleware('auth');
Route::patch('/class_batch/students/{student}/move', [StudentController::class, 'move'])
    ->middleware('auth');

//toogle

Route::patch('/enrollment/{student}/toggle', [EnrollmentController::class, 'toggle'])
    ->name('enrollment.toggle');


//add grades
Route::get('/class_batch/students/{student}/add', [GradeController::class, 'add'])
    ->middleware('auth');
Route::post('/class_batch/students/{student}/store', [GradeController::class, 'store'])
    ->middleware('auth');
Route::post('/class_batch/students/{student}/reload', [GradeController::class, 'reload'])
    ->middleware('auth');
Route::get('/evaluation/{student}', [GradeController::class, 'evaluation'])
    ->middleware('auth');
Route::get('/evaluation/{student}/pdf', [GradeController::class, 'generatePdf'])
    ->middleware('auth');
Route::get('/evaluation/{student}/pdf_print', [GradeController::class, 'printPdf'])
    ->middleware('auth');

Route::get('/class_batch/{class_batch}/students/add-multiple/show', [GradeController::class, 'showAddMultipleGrades'])
    ->middleware('auth');
Route::post('/class_batch/{class_batch}/grades/store-multiple', [GradeController::class, 'storeMultipleGrades'])
    ->name('grades.store.multiple');



//dashboard
Route::get('/dashboard/admin', [DashboardController::class, 'index'])
    ->middleware('admin');




//STUDENTS PROFILE
Route::get('/dashboard/students-profile', [StudentsProfile::class, 'index'])
    ->middleware('admin');
Route::get('/dashboard/student/profile/{student}', [StudentsProfile::class, 'edit'])
    ->middleware('admin');
Route::patch('/dashboard/student/profile/{student}', [StudentsProfile::class, 'update'])
    ->middleware('admin');

//ACCOUNTS
Route::get('/dashboard/manage-accounts', [Accounts::class, 'index'])
    ->middleware('admin');
Route::delete('/dashboard/manage-accounts/{account}', [Accounts::class, 'destroy'])
    ->middleware('admin');

//Batches
Route::get('/dashboard/class_batch', [Batch::class, 'index'])
    ->middleware('admin');
Route::get('/dashboard/classBatch/{batch}/edit', [Batch::class, 'edit'])
    ->middleware('admin');
Route::patch('/dashboard/classBatch/{batch}', [Batch::class, 'update'])
    ->middleware('admin');

//subject
Route::get('/subjects', [SubjectController::class, 'index'])
    ->middleware('admin');
Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])
    ->middleware('admin');
Route::put('/subject/{subject}/update', [SubjectController::class, 'update'])
    ->middleware('admin');
Route::get('/subject/create', [SubjectController::class, 'create'])
    ->middleware('admin');
Route::post('/subject', [SubjectController::class, 'store'])
    ->middleware('admin');
Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])
    ->middleware('admin');

//Evaluation Template
Route::get('/dashboard/evaluation_template', [EvaluationTemplate::class, 'create'])
    ->middleware('admin');
Route::post('/dashboard/evaluation_template', [EvaluationTemplate::class, 'store'])
    ->middleware('admin');


//Auth admin
Route::view('/create-account/user', 'auth_admin.register')
    ->middleware('admin');
Route::post('/register/user', register::class);

//auth_superAdmin
Route::view('/create-account/admin', 'auth_super_admin.register')
    ->middleware('guest');
Route::post('/register/admin', Register::class);

Route::view('/login', 'auth.login')
    ->name('login')
    ->middleware('guest');
Route::post('/login', Login::class);
Route::post('/logout', Logout::class)
    ->name('logout')
    ->middleware('auth');

//DEveloper
Route::view('/120601', 'auth.register')
    ->middleware('guest');
Route::post('/register', Registration::class);

Route::view('/create-account/superadmin', 'auth_super_admin.register')
    ->middleware('super_admin');



