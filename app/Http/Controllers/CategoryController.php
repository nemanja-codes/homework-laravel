<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return new CategoryCollection($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['Category is created successfully.', new CategoryResource($category)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($category_id);
        if (is_null($category))
            return response()->json('Data not found', 404);
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json('Category is deleted successfully.');
    }
}
