<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
*/
Route::post('/subscribe',[SubscriptionController::class,'SubscriptionController@subscribe']);
Route::post('/newpost',[PostController::class, 'newPost']);