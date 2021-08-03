<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ReportDayController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\AdminConfigSystem;
use App\Http\Controllers\ResetPasswordController;

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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    
    // đổi mật khẩu cho nguoi dung khi da dang nhap
    Route::post('changePassAfterLogin', [ResetPasswordController:: class,'changePass']);
    // upload avatar và lưu vao database
    Route::post('upload', [PassportAuthController::class, 'upload']);
    Route::get('details', [PassportAuthController::class, 'details']);
    // route này sẽ gửi lại link xác minh
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'resendNotification'])
    ->name('verification.send');
    });
// route này sẽ hiện ra khi người dùng click vào link xác minh
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');
//api gửi báo cáo ngày tư vấn giam sát
Route::middleware('auth:api')->group(function () {
    Route::resource('post/bcday', ReportDayController::class);
});
//=======================================\\//================================//
/* PHẦN API CHO USER */
// lấy dữ liệu user và role về từ data base
Route::get('getDataTableUser', [AdminUserController::class, 'index']);
// lấy dữ liệu role về từ data base
Route::get('getDataTableRole', [AdminRoleController::class, 'index']);
// tao user va role
Route::post('createUser', [AdminUserController::class, 'store']);
// edit user va role
Route::post('updateUser/{id}', [AdminUserController::class, 'update']);
// delete user va role
Route::post('deleteUser/{id}', [AdminUserController::class, 'delete']);
// edit role
Route::post('updateRole/{id}', [AdminRoleController::class, 'update']);
// delete role
Route::post('deleteRole/{id}', [AdminRoleController::class, 'delete']);
// tao role
Route::post('createRole', [AdminRoleController::class, 'store']);
// thay doi file env
Route::post('changeEnvironment', [AdminConfigSystem::class, 'changeEnvironment']);
// bảo trì hệ thống
Route::post('offSystem', [AdminConfigSystem::class, 'offSystem']);
// mở lại hệ thống
Route::post('onSystem', [AdminConfigSystem::class, 'onSystem']);
// gửi email reset pass
Route::post('sendEmailResetPassword', [ResetPasswordController:: class,'sendMail']);
// đổi mật khẩu
Route::post('changePass', [ResetPasswordController:: class,'reset']);
// lấy đường dãn file avatar
Route::get('getPathFile/{id}', [PassportAuthController::class, 'getPathFile']);
/* API CHO DANG BAI VIET */

//====================================\\//====================================//


//=======================================\\//==========================================================//






/* PHẦN LƯU VÀ CHỈNH SỬA TRONG BẢNG CHÍNH CỦA LƯU VẬT TƯ */




Route::get('test', [PassportAuthController::class, 'test']);