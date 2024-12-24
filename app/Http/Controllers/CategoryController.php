<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('expenses')
            ->withSum('expenses', 'amount')
            ->latest()
            ->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'The category name is required',
            'name.string' => 'The category name must be text',
            'name.max' => 'The category name cannot exceed 255 characters',
            'name.unique' => 'This category name already exists'
        ];

        $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ], $messages);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->expenses()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Cannot delete category with associated expenses');
        }
        
        $category->delete();
        return redirect()->route('categories.index');
    }
}
