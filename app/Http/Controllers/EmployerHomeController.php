<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;


class EmployerHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $jobs = Auth::user()->favourites;
        // return view('home', compact('jobs'));
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::get()->random(10);
        return view('seekerhome', compact('jobs', 'companies'));
    }
}
