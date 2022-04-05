<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;


class HomeController extends Controller
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
        if(Auth::user()->user_type == 'employer'){
            $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('companyhome', compact('jobs'));


        }
        else
        {
            $jobs = Job::latest()->limit(10)->where('status', 1)->get();
            $companies = Company::get();
            $companiescount = count($companies);
            if ($companiescount == 0)
            {
                
            }
            else
            {
               $companies = Company::get()->random();
            }

            return view('seekerhome', compact('jobs'));
        }


        
    }
}
