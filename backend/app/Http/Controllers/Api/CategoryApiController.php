<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryApiController extends Controller
{
    //
    public function getAll()
    {
        return response()->json(
            [
                'status' => 'success',
                'categories' => Category::paginate(5),
            ], 200);
    }
}
