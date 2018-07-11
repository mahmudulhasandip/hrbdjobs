<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Job_category;
use App\Job;
use App\Employer;
use App\Employer_company_info;
use App\Job_level;

use DB;

class BrowseJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->input('page')){
        //     return $request->input('page');
        // }

        $data['jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy('updated_at', 'desc')
                                ->paginate(5);
        if ($request->ajax()) {
            return view('users.load', $data)->render();  
        }

        $data['categories'] = DB::table('job_categories')
                                ->join('jobs', 'jobs.job_category_id', '=', 'job_categories.id')
                                ->select('job_categories.id')
                                ->groupBy('job_categories.id')
                                ->where('jobs.is_verified', '=', 1)
                                ->where('jobs.is_paused', '=', 0)
                                ->where('jobs.is_drafted', 0)
                                ->where('jobs.deadline', '>=', date('Y-m-d'))
                                ->orderBy('jobs.is_special', 'asc')
                                ->get();
        $data['job_levels'] = DB::table('job_levels')
                                ->join('jobs', 'jobs.job_level_id', '=', 'job_levels.id')
                                ->select('job_levels.id')
                                ->groupBy('job_levels.id')
                                ->where('jobs.is_verified', '=', 1)
                                ->where('jobs.is_paused', '=', 0)
                                ->where('jobs.is_drafted', 0)
                                ->where('jobs.deadline', '>=', date('Y-m-d'))
                                ->get();

        $data['cities'] = DB::table('employers')
                            ->join('jobs', 'jobs.employer_id', '=', 'employers.id')
                            ->join('employer_company_infos', 'employer_company_infos.employer_id', '=', 'employers.id')
                            ->where('jobs.deadline', '>=', date('Y-m-d'))
                            ->where('jobs.is_paused', '=', 0)
                            ->where('jobs.is_verified', '=', 1)
                            ->select('employer_company_infos.city')
                            ->groupBy('employer_company_infos.city')
                            ->get();

        $data['live_jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                            ->where('is_paused', '=', 0)
                            ->where('is_verified', '=', 1)
                            ->count();

        $data['experiences'] = DB::table('jobs')
                                ->select('experience')
                                ->groupBy('experience')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->where('deadline', '>=', date('Y-m-d'))
                                ->get();
        ############## TO DO
        $data['industries'] = DB::table('company_industries')
                                ->join('industries', 'industries.id', '=', 'company_industries.industry_id')
                                ->select('industries.id')
                                ->groupBy('industries.id')
                                ->get();

        return view('users.browse_jobs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('single.job', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
