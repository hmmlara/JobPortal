<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return response()->json(
            [
                'status' => 'success',
                'categories' => $categories
            ],200);
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
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Successfully Created'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Category $category)
    {
        //
        return response()->json(
            [
                'status' => 'success',
                'category' => $category,
            ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Successfully Updated',
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully deleted'
        ],200);
    }
}
