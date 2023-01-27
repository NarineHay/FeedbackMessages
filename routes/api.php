<?php

use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\UsersController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    'message' => MessagesController::class,
    'message/create' => MessagesController::class,
    'message/{id}/show' => MessagesController::class,
]);
Route::post('message/show_message',[MessagesController::class ,'show_message' ]);
Route::post('message/list',[MessagesController::class ,'list' ]);
Route::get('users/exportexcel', [UsersController::class, 'exportExcel_api'])->name('users.exportexcel');



