<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventsController;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/my-account', [AuthController::class, 'myAccountForm'])->name('my-account-form');
Route::get('/reset-password', [AuthController::class, 'resetPasswordForm'])->name('reset-password-form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');

Route::get('/', [EventsController::class, 'dashboardPage'])->name('dashboard-page');
Route::get('/events/add', [EventsController::class, 'addEventForm'])->name('add-event-form');
Route::post('/events/add', [EventsController::class, 'addEvent'])->name('add-event');
Route::get('/events/edit/{id}', [EventsController::class, 'editEventForm']);
Route::post('/events/edit/{id}', [EventsController::class, 'editEvent']);
Route::get('/events/delete/{id}', [EventsController::class, 'deleteEvent']);

Route::get('/categories/add', [CategoriesController::class, 'addCategoryForm'])->name('add-category-form');
Route::post('/categories/add', [CategoriesController::class, 'addCategory'])->name('add-category');
Route::get('/categories', [CategoriesController::class, 'categoriesList'])->name('categories-list');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'editCategoryForm']);
Route::post('/categories/edit/{id}', [CategoriesController::class, 'editCategory']);
Route::get('/categories/delete/{id}', [CategoriesController::class, 'deleteCategory']);
