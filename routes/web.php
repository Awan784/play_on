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

use App\Http\Controllers\Admin\Auth\ProfileController;
use App\Http\Controllers\front\OrderControlller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
})->name('home');
Route::get('students', [\App\Http\Controllers\Admin\EmployeeController::class, 'index']);
Route::get('students/list', [\App\Http\Controllers\Admin\EmployeeController::class, 'getStudents'])->name('students.list');
Route::group([ 'prefix' => 'admin' ,'as' => 'admin.'], function () {

    // Login Routes...
    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');

    // Registration Routes...
    Route::get('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('register');

    // Logout Routes...
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    // Password Verify Routes...
    Route::get('email/verify', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    // Password Confirmation Routes...
    Route::get('/password/confirm', [App\Http\Controllers\Admin\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('/password/confirm', [App\Http\Controllers\Admin\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm');



    Route::group(['middleware' => ['auth:admins']], function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // Profile
        Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
        Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update');
        Route::group(['middleware' => []], function () {
            Route::get('blank-page', [App\Http\Controllers\Admin\DashboardController::class, 'blankPage'])->name('blank-page');
        });
//        Route::get('blank-page', [App\Http\Controllers\Admin\DashboardController::class, 'blankPage'])->name('blank-page');
        Route::group(['middleware' => []], function () {
            Route::get('order',[ App\Http\Controllers\Admin\OrderController::class,'index'])->name('order.index');
            Route::resources([
                'settings' => App\Http\Controllers\Admin\SettingsController::class,
                'roles' => App\Http\Controllers\Admin\RoleController::class,
                'permissions' => App\Http\Controllers\Admin\PermissionController::class,
                'venue' => App\Http\Controllers\Admin\VenueController::class,
                'user' => App\Http\Controllers\Admin\UserController::class,
                'manager' => App\Http\Controllers\Admin\ManagerController::class,
            ]);
        });
    });

});

//Auth::routes(['verify' => true]);
Route::group([], function () {

    // Venue
    Route::get('/venue/search={search}&&location={location}&&category={category}', [App\Http\Controllers\Front\VenueController::class, 'search']);
    Route::get('/venue', [App\Http\Controllers\Front\VenueController::class, 'index'])->name('venue');
    Route::get('/venue/{id}', [App\Http\Controllers\Front\VenueController::class, 'detail'])->name('venue.detail');
//    Venue End
    Route::get('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'login'])->name('login');
    Route::get('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('register/type', [App\Http\Controllers\Front\Auth\RegisterController::class, 'showRegistrationType'])->name('register.type');
    Route::post('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'register'])->name('register');
    Route::post('logout', [App\Http\Controllers\Front\Auth\LoginController::class, 'logout'])->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\Front\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Front\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Front\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Front\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    // Password Confirmation Routes...
    Route::get('email/verify', [App\Http\Controllers\Front\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Front\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [App\Http\Controllers\Front\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('/password/confirm', [App\Http\Controllers\Front\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('/password/confirm', [App\Http\Controllers\Front\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm');

    Route::group([], function () {
        Route::group(['as' => 'front.', 'middleware' => ['auth']], function () {
            Route::post('venue/register',[OrderControlller::class,'create'])->name("venue.register");
            Route::get('dashboard', [App\Http\Controllers\Front\DashboardController::class, 'index'])->name('dashboard');
            Route::group(['middleware' => ['password.confirm']], function () {
                Route::get('paypal', [App\Http\Controllers\Front\DashboardController::class, 'testPage'])->name('paypal');
            });
        });
    });
});
