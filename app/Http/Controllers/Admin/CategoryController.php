<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::query();

        if (request('search')) {
            $category->orderBy('id', 'DESC')->where('name', 'like', "%" . request('search') . "%");
        } else {
            $category->orderBy('id', 'DESC');
        }

        $category = $category->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable|min:10'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        alert()->success('دسته بندی با موفقیت ثبت شد.', 'با موفقیت');
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable|min:10'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        alert()->success('دسته بندی با موفقیت ویرایش شد.', 'با موفقیت');
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        alert()->error('دسته بندی با موفقیت حذف شد.', 'با موفقیت');
        return redirect()->route('admin.categories.index');
    }

    public function upload_ckeditor(Request $request)
    {
        $file = $request->file('upload')->getClientOriginalName();
        $request->upload->move(public_path('assets/images/categories'), $file);
        echo json_encode(['file_name' => $file]);
    }

    public function file_browser()
    {
        $paths = glob(public_path('assets/images/categories/*'));
        $fileNames = [];
        foreach ($paths as $path) {
            array_push($fileNames, basename($path));
        }
        $data = ['fileNames' => $fileNames];
        return view('admin.category.file_browser')->with($data);
    }
}
