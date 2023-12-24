<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    function create() {
        return view('categories.create');
    }

    function store(Request $request) {
        return $request->all();
    }
}
