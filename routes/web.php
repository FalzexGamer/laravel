<?php

use Illuminate\Support\Facades\Route;
use App\Models\job;



Route::get('/', function () {
    return view('home');
});

//Index Job
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->Paginate(10);
    return view('jobs.index', ['jobs' => $jobs]);
});

//Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//Show Job
Route::get('/jobs/{id}', function ($id) {
    $job = job::find($id);
    return view('jobs.show', ['job' => $job]);
});

//Store Job
Route::post('/jobs', function(){
    //validation
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required'],
    ]);
    
    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1,
    ]);

    return redirect('/jobs'); 
});

//Edit Job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//Update Job
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required']
    ]);    
    //authorize and persist
   $job = Job::findOrFail($id);
   $job->update([
    'title'=> request('title'),
    'salary'=> request('salary'),
   ]);
   //redirect
    return redirect('/jobs/'. $job->id);
});

//Delete Job
Route::delete('/jobs/{id}', function ($id) {
    //authorize and persist

    //delete the job
    $job = Job::findOrFail($id);
    $job->delete();

    //redirect
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
