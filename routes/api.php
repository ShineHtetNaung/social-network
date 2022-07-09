<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
/*
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/auth/register', [ RegisterController::class, 'register' ]);
Route::post('/auth/login', [ LoginController::class, 'login' ]);
Route::middleware('auth:api')->group(function () {
    Route::post('/page/create', [ PageController::class, 'create' ]);
    Route::put('/follow/person/{personId}', [ FollowController::class, 'follow' ]);
    Route::put('/follow/page/{pageId}', [ FollowController::class, 'follow_page' ]);
    Route::post('/person/attach-post', [ PostController::class, 'post' ]);
    Route::post('/page/{pageId}/attach-post', [ PostController::class, 'post_page' ]);
    Route::get('/person/feed', [ PostController::class, 'feed' ]);
});
