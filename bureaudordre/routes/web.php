<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourrierEntrantController;
use App\Http\Controllers\CourrierSortantController;
use Illuminate\Support\Facades\URL;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('empty', function () {
    return view('empty');
});

Route::get('dashboards', function () {
    return view('dashboard');
});

//Student Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

//Messagerie
Route::resource('/message',         MessageController::class);
Route::get('/message',              [MessageController::class, 'index']);
Route::post('/addmessage',          [MessageController::class, 'store']);
Route::post('/addmessagemultiple',  [MessageController::class, 'storeServiceMultipleUsers']);
Route::post('/addmessageservice',   [MessageController::class, 'storeService']);
//Route::get('/message',            [MessageController::class, 'msgEnvoye']);
Route::get('show-message/{id}',     [MessageController::class, 'show']);
Route::get('show-message-service/{id}/{idMessageUser}', [MessageController::class, 'showService']);

Route::get('show-message-send/{message}', [MessageController::class, 'showServiceSend']);
Route::get('show-message-receive/{id}/{idMessageUser}', [MessageController::class, 'showServiceReceive']);

Route::get('edit-message/{id}',     [MessageController::class, 'edit']);
Route::get('update-message/{id}',   [MessageController::class, 'update']);
Route::get('reply-message/{idUser}/{nameUser}/{roleUser}',[MessageController::class, 'replayMessage']);
Route::get('corbeil-message/{id}',  [MessageController::class, 'corbeilMessage']);
Route::get('restaurer-message/{id}',[MessageController::class, 'restaurerMessage']);
Route::get('delete-message/{id}',   [MessageController::class, 'deleteMessage']);

//Agenda Routes
Route::resource('/agenda',           AgendaController::class);
Route::get('/agenda',                [AgendaController::class, 'liste']);
Route::get('dashboards',             [AgendaController::class, 'index']);
Route::post('agenda',                [AgendaController::class, 'store']);
Route::get('show-agenda/{id}',       [AgendaController::class, 'show']);
Route::get('edit-agenda/{id}',       [AgendaController::class, 'edit']);
Route::get('update-agenda/{id}',     [AgendaController::class, 'update']);
Route::put('update-fileAgenda/{id}', [AgendaController::class, 'updateFileAgenda']);
Route::get('delete-agenda/{id}',     [AgendaController::class, 'destroy']);

//Courriers Entrants Routes
Route::resource('/entrants',          CourrierEntrantController::class);
Route::post('entrants',               [CourrierEntrantController::class, 'store']);
Route::get('show-entrant/{id}',       [CourrierEntrantController::class, 'show']);
Route::get('edit-entrant/{id}',       [CourrierEntrantController::class, 'edit']);
Route::get('update-entrant/{id}',     [CourrierEntrantController::class, 'update']);
Route::put('update-fileEntrant/{id}', [CourrierEntrantController::class, 'updateFileEntrant']);
Route::get('delete-entrant/{id}',     [CourrierEntrantController::class, 'destroy']);

//Courriers Sortants Routes
Route::resource('/sortants',          CourrierSortantController::class);
Route::post('sortants',               [CourrierSortantController::class, 'store']);
Route::get('show-sortant/{id}',       [CourrierSortantController::class, 'show']);
Route::get('edit-sortant/{id}',       [CourrierSortantController::class, 'edit']);
Route::get('update-sortant/{id}',     [CourrierSortantController::class, 'update']);
Route::put('update-fileSortant/{id}', [CourrierSortantController::class, 'updateFileSortant']);
Route::get('delete-sortant/{id}',     [CourrierSortantController::class, 'destroy']);


Route::get('dashboards', [DashboardController::class, 'countIndicator']);
});



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard');
    Route::get('profile.show', [StudentController::class, 'monProfil']);
    //Route::get('/user/profile', [StudentController::class, 'monProfil']);
});

// Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
// Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');
URL::forceScheme('https');
