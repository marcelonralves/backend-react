<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show() : JsonResponse
    {
        $categories = Category::all();
        return response()->json(compact('categories'));
    }

    public function postCategory(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
       $newCategory = Category::create($request->only('name'));
        return response()->json(compact('newCategory'));
    }
}
