<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
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

//class


Route::get('/', function () {
    return view('home',);
})->name('home');


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
    ]);
})->name('jobs');






Route::get('/jobs/{id}', function ($id) {


    $job = Job::find($id);


    return view('job_details', ['job' => $job]);
})->name('jobs.details');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');
