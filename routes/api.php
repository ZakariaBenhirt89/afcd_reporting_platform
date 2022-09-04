<?php

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

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

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/v1/register', [Controller::class, 'register']);
Route::post('/v1/register/phone', [Controller::class, 'registerByPhone']);
Route::post('/v1/login', [Controller::class, 'login']);
Route::middleware('auth:sanctum')->post('/v1/logout', [Controller::class, 'logout']);
Route::post('/v1/login/phone', [Controller::class, 'loginByPhone']);
Route::middleware('auth:sanctum')->get('/v1/blogs' , [Controller::class, 'index']);
Route::middleware('auth:sanctum')->get('/v1/issue' , [Controller::class, 'getIssuesAll']);
Route::middleware('auth:sanctum')->get('/v1/user/{id}' , [Controller::class, 'getUserData']);
Route::middleware('auth:sanctum')->get('/v1/cats' , [Controller::class, 'getIssues']);
Route::middleware('auth:sanctum')->post('/store/image' , [Controller::class, 'storeImage']);
Route::middleware('auth:sanctum')->post('/store/report' , [Controller::class, 'storeReport']);

