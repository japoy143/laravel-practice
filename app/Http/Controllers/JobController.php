<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{


    public function index()
    {
        // $jobs = Job::with("employer")->get(); //eager loading
        // $jobs = Job::with("employer")->paginate(6); //pagination
        // $jobs = Job::with("employer")->simplePaginate(6);
        $jobs = Job::with("employer")->latest()->simplePaginate(6); //latest sort
        // $jobs = Job::with("employer")->cursorPaginate(6); //pagination

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        //validation
        //server side
        request()->validate([
            'title' => ['required', 'string', 'min:2'],
            'salary' => ['required', 'string'],
        ]);

        // dd(request()->all());
        // dd(request('salary'));
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($job->email)->queue(new JobPosted($job));

        return redirect('/jobs');
    }
    public function edit(Job $job)
    {


        //the job post belongs to employer then the employer belong to the user then if the user is thesame from the user
        //authenticated of logged the allow permission or redirect
        // if ($job->employer->user->is(Auth::user())) {
        //     return view('jobs.edit', ['job' => $job]);
        // }
        Gate::authorize('edit-job', $job);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //validate
        request()->validate([
            'title' => ['required', 'string', 'min:2'],
            'salary' => ['required', 'string'],
        ]);
        //authorize

        // persist


        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        //another way
        $job->update(["title" => request('title'), "salary" => request('salary')]);

        // redirect

        // return redirect('/jobs/' . $job->id);

        return redirect(route('jobs.show', $job->id))->with('success', 'Successfully updated');
    }



    public function destroy(Job $job)
    {
        //authorize

        //delete the job
        $job->delete(); //binding


        return redirect('/jobs');
    }
}
