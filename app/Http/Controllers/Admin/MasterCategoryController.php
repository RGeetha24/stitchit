<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\MasterCategory;
use Illuminate\Support\Str;

class MasterCategoryController extends Controller
{
    public function index()
    {
        $categories = MasterCategory::orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.mastercategory.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.mastercategory.create');
    }

    public function store(CategoryFormRequest $request)
    {
        // Validate and store the category data
        $data = $request->validated();

        // $data['uuid'] = Str::uuid();
        // $data['slug'] = Str::slug($data['name']);

        if($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/mastercategory/';
            $file->move(public_path($path), $imageName);

            $data['image'] = $imageName;
        }

        MasterCategory::create($data);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = MasterCategory::findOrFail($id);
        return view('admin.mastercategory.show', compact('category'));
    }

    public function edit($id)
    {
        $category = MasterCategory::findOrFail($id);
        return view('admin.mastercategory.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $category = MasterCategory::findOrFail($id);
        $data = $request->validated();

        if($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/mastercategory/';
            $file->move(public_path($path), $imageName);

            $data['image'] = $imageName;
        }

        $category->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = MasterCategory::findOrFail($id);
        if ($category->image) {
            $imagePath = public_path('uploads/mastercategory/' . $category->image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }
        $category->delete();

        return redirect()->route('admin.mastercategory.index')->with('success', 'Category deleted successfully.');
    }
}
