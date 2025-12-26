<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\MasterCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::with('masterCategory')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $masterCategories = MasterCategory::all();
        return view('admin.categories.create', compact('masterCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'master_category_id' => 'required|exists:master_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['uuid'] = (string) Str::uuid();
        $validated['status'] = $request->boolean('status', true);

        if($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/category/';
            $file->move(public_path($path), $imageName);

            $validated['image'] = $imageName;
        }

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $masterCategories = MasterCategory::all();
        return view('admin.categories.edit', compact('category', 'masterCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'master_category_id' => 'required|exists:master_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id . '|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['status'] = $request->boolean('status', true);

        if($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/category/';
            $file->move(public_path($path), $imageName);

            $validated['image'] = $imageName;

        }
        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->image) {
            $imagePath = public_path('uploads/category/' . $category->image);
            if (is_file($imagePath) && file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
