<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category) {
        $post = $category->posts()->paginate(6);
        return view('posts.index', compact('post', 'category'));
    }
}
