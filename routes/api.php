<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MangaController;
use App\Http\Controllers\API\VolumeController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\FavoriteController;


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/manga', [MangaController::class, 'index']);
Route::get('/manga/{id}', [MangaController::class, 'show']);
Route::get('/volumes/{id}', [VolumeController::class, 'show']);
Route::get('/comments', [CommentController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/comments', [CommentController::class, 'store']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::delete('/favorites/{mangaId}', [FavoriteController::class, 'destroy']);
    Route::get('/favorites/{mangaId}', [FavoriteController::class, 'isFavorite']);
});
