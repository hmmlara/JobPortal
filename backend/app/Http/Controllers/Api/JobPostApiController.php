<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Exception;
use Illuminate\Http\Request;

class JobPostApiController extends Controller
{
    //
    public function getAllPosts()
    {
        $jobposts = JobPost::where('status', 'Active')->latest()->paginate(5);

        foreach ($jobposts as $jobpost) {
            $jobpost->category;
            $jobpost->location;
            $jobpost->company;
            $jobpost->jobType;
        }

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'jobPosts' => $jobposts,
            ], 200);
    }

    public function getJobPostDetails($id)
    {
        // dd($id);
        try{
            // dd($id);
            $jobpost = JobPost::select('job_posts.*','categories.*', 'companies.*', 'job_types.*', 'locations.*')
                ->join('categories', 'categories.id', 'job_posts.category_id')
                ->join('companies', 'companies.id', 'job_posts.company_id')
                ->join('job_types', 'job_types.id', 'job_posts.job_type_id')
                ->join('locations', 'locations.id', 'job_posts.location_id')
                ->where('job_posts.id', $id)
                ->first();

            return response()->json(
                [
                    'status' => 200,
                    'statusText' => 'success',
                    'jobPost' => $jobpost,
                ], 200);

        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => 404,
                    'statusText' => 'Not Found',
                    'message' => 'Job post not',
                ], 404);

        }

    }
    public function searchJob(Request $request)
    {

        if (!empty($request->category_name)) {
            $jobposts = JobPost::where('categories.name', 'LIKE', "%$request->category_name%")
                ->where('status', 'Active')
                ->join('categories', 'categories.id', 'job_posts.category_id')
                ->get();
        } else if (!empty($request->job_type)) {
            $jobposts = JobPost::where('job_types.job_type', 'LIKE', "%$request->job_type%")
                ->where('status', 'Active')
                ->join('job_types', 'job_types.id', 'job_posts.job_type_id')
                ->get();
        } else {
            $jobposts = JobPost::where('categories.name', 'LIKE', "%$request->category_name%")
                ->where('job_types.job_type', 'LIKE', "%$request->job_type%")
                ->where('status', 'Active')
                ->join('categories', 'categories.id', 'job_posts.category_id')
                ->join('job_types', 'job_types.id', 'job_posts.job_type_id')
                ->get();
        }
        foreach ($jobposts as $jobpost) {
            $jobpost->category;
            $jobpost->location;
            $jobpost->company;
            $jobpost->jobType;
        }

        if (count($jobposts) === 0) {
            return response()->json(
                [
                    'status' => 404,
                    'statusText' => 'Not Found',
                    'message' => 'Job post not',
                ], 404);
        }

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'jobPosts' => $jobposts,
            ], 200);
    }
}
