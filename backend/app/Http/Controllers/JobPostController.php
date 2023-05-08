<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $jobposts = JobPost::paginate(7);

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'jobPosts' => $jobposts,
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'job_type_id' => 'required',
            'company_id' => 'required',
            'location_id' => 'required',
            'job_position' => 'required',
            'skill' => 'required',
            'salary' => 'required | numeric',
            'deadline' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'statusText' => 'success',
                    'messages' => $validator->errors(),
                ], 400);
        }

        return response()->json(
            [
                'status' => 201,
                'statusText' => 'success',
                'message' => 'Successfully created',
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(JobPost $jobPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(JobPost $jobPost)
    {
        //
        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'jobPost' => $jobPost,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, JobPost $jobPost)
    {
        //
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'job_type_id' => 'required',
            'company_id' => 'required',
            'job_position' => 'required',
            'location_id' => 'required',
            'skill' => 'required',
            'salary' => 'required | numeric',
            'deadline' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'statusText' => 'success',
                    'messages' => $validator->errors(),
                ], 400);
        }

        $jobPost->update($request->all());

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'message' => 'Successfully updated',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(JobPost $jobPost)
    {
        //
        $jobPost->delete();

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'message' => 'Successfully deleted',
            ], 200);
    }
}
