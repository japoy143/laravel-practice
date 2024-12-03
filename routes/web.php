<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

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

//Job Route
// Route::controller(JobController::class)->group(function () {
//     //Index
//     Route::get('/jobs',  'index')->name('jobs');
//     //Create
//     Route::get('/jobs/create',  'create')->name('jobs.create');
//     //Store
//     Route::post('/jobs',  'store')->name('jobs.save');
//     //Show
//     Route::get('/jobs/{job}',  'show')->name('jobs.details');
//     //Edit
//     Route::get('/jobs/{job}/edit',  'edit')->name('jobs.edit');
//     //Update
//     Route::patch('/jobs/{job}',  'update')->name('jobs.update');
//     //Destroy
//     Route::delete('/jobs/{job}',  'destroy')->name('jobs.delete');
// });



Route::view("/", 'home')->name('home');
Route::view("/contact", 'contact')->name('contact');
Route::view("/about", 'about')->name('about');


Route::resource("jobs", JobController::class);

//only
// Route::resource("jobs", JobController::class)->only(['index', 'show'])->middleware('auth');

//except
// Route::resource("jobs", JobController::class)->except(['index', 'show'])->middleware('auth');

//auth gate usage
// Route::view("/about", 'about')->name('about')->middleware(['auth', 'can:edit-job,job']);

//policy
// Route::view("/about", 'about')->name('about')->middleware('auth')->can('edit', 'job');

//Auth

Route::get("/register", [RegisteredController::class, 'create'])->name("register");
Route::post("/register", [RegisteredController::class, 'store'])->name("register.save");


Route::get("/login", [LoginController::class, 'create'])->name("login");
Route::post("/login", [LoginController::class, "store"])->name("login.request");


Route::post("/logout", [LoginController::class, "destroy"])->name("logout");
// Route::get("test", function () {
//     // return new JobPosted();
//     //send the mail
//     Mail::to("joserizz143@gmail.com")->send(new JobPosted());

//     return 'done';
// });
Route::get("test", function () {
    //queue
    // dispatch(function () {
    //     logger("hello");
    // })->delay(5);

    $job = Job::latest()->first();

    TranslateJob::dispatch($job);

    return 'done';
});
