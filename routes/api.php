<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserCollectionController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionAccessModelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::resource('permissions',PermissionController::class);
Route::resource('roles',RoleController::class);
Route::get('roles/{id}/permissions',[RoleController::class,'show']);
Route::put('roles/{id}/permissions',[RolePermissionController::class,'update']);
Route::get('users/{id}/roles',[UserRoleController::class,'index']);
Route::put('users/{id}/roles',[UserRoleController::class,'update']);
Route::get('users/{id}/permissions',[UserPermissionController::class,'index']);
Route::put('users/{id}/permissions',[UserPermissionController::class,'update']);
Route::apiResource('collection-access-model',CollectionAccessModelController::class);
Route::group(['middleware' => 'microservice_auth'],function(){
    Route::get('user-collections',[UserCollectionController::class,'index']);
    Route::post('user-collections',[UserCollectionController::class,'store']);
    Route::get('user-collections/{id}',[UserCollectionController::class,'show']);
    Route::get('user-collections/{id}/generete-api-key',[UserCollectionController::class,'generateApiKey']);
});
