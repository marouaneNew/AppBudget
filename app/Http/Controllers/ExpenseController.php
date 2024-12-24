<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('category')->latest()->get();
        $categories = Category::all();
        return view('expenses.index', compact('expenses', 'categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'The expense name is required',
            'name.string' => 'The expense name must be text',
            'name.max' => 'The expense name cannot exceed 255 characters',
            'amount.required' => 'The amount is required',
            'amount.numeric' => 'The amount must be a number',
            'amount.min' => 'The amount must be at least 0',
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'The selected category is invalid'
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ], $messages);

        Expense::create($request->all());
        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
