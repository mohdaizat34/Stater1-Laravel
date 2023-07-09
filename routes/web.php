<?php

use App\Http\Controllers\EditEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ExampleDataTableControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PicReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictorialReportController;


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

//Events -----------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/event', [App\Http\Controllers\EventController::class, 'event'])->name('event');
Route::get('/report', [App\Http\Controllers\ReportController::class, 'report'])->name('report');
Route::get('/picreport', [App\Http\Controllers\PicReportController::class, 'picreport'])->name('picreport');
Route::get('/pictorialreport', [App\Http\Controllers\PictorialReportController::class, 'pictorialreport'])->name('pictorialreport');
Route::get('/form', [App\Http\Controllers\FormController::class, 'form']);
Route::get('/paperwork', [App\Http\Controllers\FormController::class, 'view_paperwork']);
Route::get('/checklist', [App\Http\Controllers\ChecklistController::class, 'checklist']);


//PRE-EVENT STUFF
//edit and update
Route::get('edit_event/{id}', [EventController::class, 'editevent']);
Route::put('update_event/{id}', [EventController::class, 'update_event']);

//event status approval
Route::post('/update_status{id}', [EventController::class, 'updatestatus']);
Route::post('/event_destroy{id}', [EventController::class, 'eventdestroy']);
Route::post('/event', [EventController::class, 'postevent'])->name('submitevent');

//Route::get('/paperwork{id}', [App\Http\Controllers\FormController::class, 'view_paperwork']);

//DURING EVENT
Route::get('/pictorialreport', [PictorialReportController::class, 'pictorialreport'])->name('pictorialreport');
Route::post('/postlink/{event_id}', [PictorialReportController::class, 'postlink'])->name('postlink');

//link related 
Route::get('edit_link/{id}', [PictorialReportController::class, 'editlink']);
Route::put('update_link/{id}', [PictorialReportController::class, 'updatelink']); 

//POST EVENT 
//report 
Route::get('edit_report_link/{id}', [EventController::class, 'edit_report_link']);
Route::put('update_report_link/{id}', [EventController::class, 'update_report_link']);


Route::get('/updateform', [App\Http\Controllers\UpdateFormController::class, 'updateform']);


Route::get('/updateform', [App\Http\Controllers\UpdateFormController::class, 'updateform']);
Route::post('/updateform/{event_id}', [UpdateFormController::class, 'postupdate'])->name('submitupdate');
Route::post('/event/{event_id}', [UpdateFormController::class, 'postupdate'])->name('submitupdate');


Route::get('/statusapproval', [App\Http\Controllers\StatusApprovalController::class, 'statusapproval'])->name('event');
//--------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'example', 'as' => 'example.'], function () {
    Route::get('/', [ExampleController::class, 'index'])->name('index');
    Route::get('/create', [ExampleController::class, 'create'])->name('create');
    Route::post('store', [ExampleController::class, 'store'])->name('store');
    Route::get('/{example}/show', [ExampleController::class, 'show'])->name('show');
    Route::get('/{example}/edit', [ExampleController::class, 'edit'])->name('edit');
    Route::put('/{example}/update', [ExampleController::class, 'update'])->name('update');
    Route::delete('/{example}/destroy', [ExampleController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'example-data-table', 'as' => 'exampleDataTable.'], function () {
    Route::get('/', [ExampleDataTableControler::class, 'index'])->name('index');
    Route::get('/create', [ExampleDataTableControler::class, 'create'])->name('create');
    Route::post('store', [ExampleDataTableControler::class, 'store'])->name('store');
    Route::get('/{example}/show', [ExampleDataTableControler::class, 'show'])->name('show');
    Route::get('/{example}/edit', [ExampleDataTableControler::class, 'edit'])->name('edit');
    Route::put('/{example}/update', [ExampleDataTableControler::class, 'update'])->name('update');
    Route::delete('/{example}/destroy', [ExampleDataTableControler::class, 'destroy'])->name('destroy');
});