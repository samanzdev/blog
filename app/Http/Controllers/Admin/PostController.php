<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::query();

        if (request('search')) {
            $post->where('title', 'like', "%" . request('search') . "%")->orWhere('slug', 'like', "%" . request('search') . "%");
        } else {
            $post->orderBy('id', 'DESC');
        }

        $post = $post->with(['user', 'category'])->paginate(10);
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.post.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required',
            'category_id' => 'required',
            'sort_description' => 'required',
            'body' => 'required|min:20',
            'image' => 'required',
            'is_active' => 'required'
        ]);

        $filename = $request->slug . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/images/posts'), $filename);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'sort_description' => $request->sort_description,
            'body' => $request->body,
            'image' => $filename,
            'is_active' => $request->is_active
        ]);

        alert()->success('پست با موفقیت ایجاد شد.', 'با موفقیت');
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.post.show', compact('post', 'category'));
    }

    public function edit(Post $post)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.post.edit', compact('post', 'category'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required',
            'category_id' => 'required',
            'sort_description' => 'required',
            'body' => 'required|min:20',
            'is_active' => 'required'
        ]);

        if ($request->has('image')) {
            $image_path = public_path('assets/images/posts/'.$post->image);
            File::delete($image_path);
            $filename = $request->slug . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/posts'), $filename);
        }

        $post->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'sort_description' => $request->sort_description,
            'body' => $request->body,
            'image' => $filename ?? $post->image,
            'is_active' => $request->is_active
        ]);

        alert()->success('پست با موفقیت ویرایش شد.', 'با موفقیت');
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        //
    }

    public function upload_ckeditor(Request $request)
    {
        $file = $request->file('upload')->getClientOriginalName();
        $request->upload->move(public_path('assets/images/posts'), $file);
        echo json_encode(['file_name' => $file]);
    }

    public function file_browser()
    {
        $paths = glob(public_path('assets/images/posts/*'));
        $fileNames = [];
        foreach ($paths as $path) {
            array_push($fileNames, basename($path));
        }
        $data = ['fileNames' => $fileNames];
        return view('admin.post.file_browser')->with($data);
    }
}
