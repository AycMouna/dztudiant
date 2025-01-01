<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTrackingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

// Routes pour les candidatures
Route::prefix('applications')->group(function () {
    Route::get('{projectId}', [ApplicationController::class, 'index']);
    Route::post('/', [ApplicationController::class, 'store']);
    Route::put('{id}', [ApplicationController::class, 'update']);
    Route::delete('{id}', [ApplicationController::class, 'destroy']);
});

// Routes pour les messages
Route::prefix('messages')->group(function () {
    Route::get('{userId}/{receiverId}', [MessageController::class, 'index']);
    Route::post('/', [MessageController::class, 'store']);
    Route::get('{id}', [MessageController::class, 'show']);
    Route::delete('{id}', [MessageController::class, 'destroy']);
});

// Routes pour les notifications
Route::prefix('notifications')->group(function () {
    Route::get('{userId}', [NotificationController::class, 'index']);
    Route::put('{id}', [NotificationController::class, 'update']);
});

// Routes pour les profils
Route::prefix('profiles')->group(function () {
    Route::get('{userId}', [ProfileController::class, 'show']);
    Route::put('{userId}', [ProfileController::class, 'update']);
});

// Routes pour les projets
Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('{id}', [ProjectController::class, 'show']);
    Route::post('/', [ProjectController::class, 'store']);
    Route::put('{id}', [ProjectController::class, 'update']);
    Route::delete('{id}', [ProjectController::class, 'destroy']);
});

// Routes pour le suivi de projet
Route::prefix('project-tracking')->group(function () {
    Route::get('{projectId}', [ProjectTrackingController::class, 'index']);
    Route::post('/', [ProjectTrackingController::class, 'store']);
    Route::get('{id}', [ProjectTrackingController::class, 'show']);
    Route::put('{id}', [ProjectTrackingController::class, 'update']);
    Route::delete('{id}', [ProjectTrackingController::class, 'destroy']);
});

// Routes pour les équipes
Route::prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::get('{id}', [TeamController::class, 'show']);
    Route::post('/', [TeamController::class, 'store']);
    Route::put('{id}', [TeamController::class, 'update']);
    Route::delete('{id}', [TeamController::class, 'destroy']);
});

// Routes pour les utilisateurs
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']); 
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});