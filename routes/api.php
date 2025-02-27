<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\learn\CategoryPembelajaranController;
use App\Http\Controllers\Api\learn\MateriPembelajaranController;
use App\Models\core\MateriPembelajaran;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('api')->group(function() {
   
// });
// Route::post('register', [UserController::class, 'store']);
// Route::resource('users', UserController::class);


// Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('token', [AuthController::class, 'login']);



//before auth
Route::resource('category_pembelajaran', CategoryPembelajaranController::class);
Route::resource('materi_pembelajaran', MateriPembelajaranController::class);

// After Auth
Route::group(['middleware' => 'auth:api'], function() {
   
Route::get('users_me', [AuthController::class, 'me']);
Route::post('edit_user', [AuthController::class, 'editUser']);  
Route::resource('budget', BudgetController::class);

Route::resource('category', CategoryController::class);

Route::resource('sub_category', SubCategoryController::class);

Route::resource('activity', ActivityController::class);
});