<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $post = Post::with(['category', 'user'])->where('is_active', 1)->orderBy('id', 'DESC')->paginate(9);
        return view('blog.index', compact('post'));
    }

    public function showSingleCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $post = Post::with(['category', 'user'])->where(['is_active' => 1, 'category_id' => $category->id])->orderBy('id', 'DESC')->paginate(9);
        return view('blog.category', compact('category', 'post'));
    }
}
