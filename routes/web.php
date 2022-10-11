<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InstructorDashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Gd\Commands\RotateCommand;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome_page');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses_page');
Route::get('/courses/course/{course}', [HomeController::class, 'viewCourse'])->name('course.view');
// Route::get('/')
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/payments/verify/{payment?}', [HomeController::class, 'payment_verify'])->name('payment-verify');
Auth::routes();




Route::group(['prefix' => '/instructor'], function () {

    Route::get('/register', [InstructorController::class, 'registerPage'])->name('instructor.register_page');
    Route::post('/register', [InstructorController::class, 'register'])->name('instructor.register');
    Route::get('/login', [InstructorController::class, 'loginPage'])->name('instructor.login_page');
    Route::post('/login', [InstructorController::class, 'login'])->name('instructor.login');
    Route::get('/forgetPassword', [InstructorController::class, 'forgetPasswordPage'])->name('instructor.forgetPassword_page');
    Route::get('/resetPassword', [InstructorController::class, 'resetPasswordPage'])->name('instructor.resetPassword_page');
    Route::post('/resetPassword-link', [InstructorController::class, 'resetPasswordLink'])->name('instructor.resetPassword_link');
    Route::post('/resetPassword', [InstructorController::class, 'resetPassword'])->name('instructor.resetPassword');

    Route::group(['middleware' => 'auth:instructor'], function () {

        Route::get('/dashboard', [InstructorDashboardController::class, 'dashboard'])->name('instructor.dashboard');
        Route::get('/profile/{instructor}', [InstructorController::class, 'instructorProfile'])->name('instructor.profile');
        Route::get('/profile-settings/{instructor}', [InstructorController::class, 'instructorProfileSettings'])->name('instructor.profile_settings');
        Route::post('/profile-settings/{instructor}/update', [InstructorController::class, 'updateInstructorProfileSettings'])->name('instructor.update.profile_settings');
        Route::get('/courses', [InstructorDashboardController::class, 'coursesPage'])->name('instructor.courses_page');
        Route::post('/course/add/{instructor}', [CourseController::class, 'addNewCourse'])->name('instructor.add_course');
        Route::get('/courses/course/{course}', [InstructorDashboardController::class, 'viewCourse'])->name('instructor.view_course');
        Route::post('/courses/{course}/add-section', [SectionController::class, 'addSection'])->name('instructor.add_section');
        Route::put('/courses/update-section/{section}', [SectionController::class, 'updateSection'])->name('instructor.update_section');
        Route::get('/courses/reorder-sections', [SectionController::class, 'reorderSections'])->name('instructor.reorder_sections');
        Route::get('/courses/reorder-lessons', [LessonController::class, 'reorderLessons'])->name('instructor.reorder_lessons');

        Route::post('/course/add-lesson/', [LessonController::class, 'addLesson'])->name('instructor.upload_lesson');
        Route::post('/course/update-lesson/{id}', [LessonController::class, 'updateLesson'])->name('instructor.update_lesson');
    });
});

Route::group(['middleware' => ['auth:instructor']], function () {

    Route::post('/addNote', [NoteController::class, 'addNewNote'])->name('note.add');
    Route::get('/deleteNote/{id}', [NoteController::class, 'deleteNote'])->name('note.delete');
});


Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('/home', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::post('/credit/payment/{course}', [PaymentController::class, 'creditPayment'])->name('payment.credit');
    Route::get('/credit/payment/callback', [PaymentController::class, 'creditCallback'])->name('payment.callback');
});

Route::get('login/github', [SocialLoginController::class, 'redirectToProvider']);
Route::get('login/github/callback', [SocialLoginController::class, 'handleProviderCallback']);
