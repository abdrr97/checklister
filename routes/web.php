<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\User\ChecklistController as UserChecklistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::view('/', 'welcome');

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('welcome', [ControllersPageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [ControllersPageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [UserChecklistController::class, 'show'])->name('user.checklists.show');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function ()
    {
        Route::resource('pages', PageController::class);
        Route::resource('checklist_groups', ChecklistGroupController::class)->except(['index', 'show']);
        Route::resource('checklist_groups.checklists', ChecklistController::class)->except(['index', 'show']);
        Route::resource('checklists.tasks', TaskController::class);
        Route::resource('pages', PageController::class)->only(['edit', 'update']);
        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
});
