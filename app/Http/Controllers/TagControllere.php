<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagControllere extends Controller
{
    public function index(Tag $tag) {
        $post = $tag->posts()->paginate(6);
        return view('posts.index', compact('post', 'tag'));
    }
}
