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
        $city = "";
        $gender = 0;
        $experience = 1000;
        $keyword = "";
        $job_levels = [];
        $cat = [];
        $per_page = 10;
        $order_by = 'desc';
        $sorted_by = 'recent';
        $sorted_type = 'updated_at';

        if ($request->session()->has('per_page')) {
            $per_page = $request->session()->get('per_page');
        }

        if ($request->session()->has('order_by')) {
            // sorted by title 
            // TO DO
            $sorted_by = $request->session()->get('order_by');
            if($sorted_by == 'recent'){
                $order_by = 'desc';
            }else if($sorted_by == 'asc'){
                $order_by = 'asc';
            }else if($sorted_by == 'desc'){
                $order_by = 'desc';
            }else if($sorted_by == 'title-a-z'){
                $sorted_type = 'title';
                $order_by = 'asc';
            }else if($sorted_by == 'title-z-a'){
                $sorted_type = 'title';
                $order_by = 'desc';
            }
        }

        $data['city_search'] = 0;
        $data['gender'] = 0;
        $data['experience_search'] = 1000;
        $data['keyword'] = '';
        $data['search_job_levels'] = [];
        $data['search_cat'] = [];

        if($request->input('city')){
            $city = $request->input('city');
            $data['city'] = $request->input('city');
        }
        if($request->input('gender')){
            $gender = $request->input('gender');
            $data['gender'] = $request->input('gender');
        }

        if($request->input('experience')){
            $experience = $request->input('experience');
            $data['experience'] = $request->input('experience');
        }

        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $keyword = str_replace('+', ' ', $keyword);
            $data['keyword'] = $request->input('keyword');
        }

        if($request->input('job_level')){
            $job_levels = $request->input('job_level');
            $data['search_job_levels'] = $job_levels;
        }

        if($request->input('cat')){
            $cat = $request->input('cat');
            $data['search_cat'] = $request->input('cat');
        }

        if(sizeof($cat) > 0 && sizeof($job_levels) > 0 && $keyword && $city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->whereIn('job_level_id',  $job_levels)
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($cat) > 0 && $keyword && $city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($job_levels) > 0 && $keyword && $city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->whereIn('job_level_id',  $job_levels)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate(5);
        }else if(sizeof($cat) > 0 && $keyword){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($cat) > 0 && $city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($job_levels) > 0 && $keyword){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->whereIn('job_level_id',  $job_levels)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($job_levels) > 0 && $city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->whereIn('job_level_id',  $job_levels)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($cat) > 0){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($job_levels) > 0){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->whereIn('job_level_id',  $job_levels)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if(sizeof($cat) > 0 && sizeof($job_levels) > 0){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->whereIn('job_level_id',  $job_levels)
                                ->whereIn('job_category_id', $cat)
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if($keyword){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like',  '%'.$keyword.'%')
                                ->orWhere('qualification', 'like',  '%'.$keyword.'%')
                                ->orWhere('location', 'like',  '%'.$keyword.'%')
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else if($city){
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('location', 'like', '%'.$city.'%')
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }else{
            $data['jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                                ->where('gender',  $gender)
                                ->where('experience', '<=', $experience)
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_drafted', 0)
                                ->orderBy($sorted_type, $order_by)
                                ->paginate($per_page);
        }

        $data['sorted_by'] = $sorted_by;
        $data['per_page'] = $per_page;

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
        $data['page'] = 'browse_jobs';
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

    public function postSortedBy(Request $request){
        $request->session()->put('order_by', $request->input('sort_by'));
        return 'success';
    }

    public function postPerPage(Request $request){
        $request->session()->put('per_page', $request->input('per_page'));
        return 'success';
    }

}
