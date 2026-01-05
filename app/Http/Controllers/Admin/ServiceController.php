<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::with(['masterCategory', 'category'])->orderBy('sort_order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $masterCategories = \App\Models\MasterCategory::with(['categories' => function($q) {
            $q->where('status', true)->orderBy('name');
        }])->where('status', true)->orderBy('name')->get();
        
        return view('admin.services.create', compact('masterCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'master_category_id' => 'required|exists:master_categories,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:services|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['uuid'] = (string) Str::uuid();
        $validated['status'] = $request->boolean('status', true);

        if($request->hasFile('icon')) {
            if (!$request->file('icon')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('icon');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/services/';
            $file->move(public_path($path), $imageName);

            $validated['icon'] = $imageName;
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        $masterCategories = \App\Models\MasterCategory::with(['categories' => function($q) {
            $q->where('status', true)->orderBy('name');
        }])->where('status', true)->orderBy('name')->get();
        
        return view('admin.services.edit', compact('service', 'masterCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'master_category_id' => 'required|exists:master_categories,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:services,slug,' . $service->id . '|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['status'] = $request->boolean('status', true);

        if($request->hasFile('icon')) {
            if (!$request->file('icon')->isValid()) {
                return back()->withErrors('Invalid file upload');
            }
            $file = $request->file('icon');
            $imgExt = $file->getClientOriginalExtension();
            $imageName = time().'.'.$imgExt;
            $path = 'uploads/services/';
            $file->move(public_path($path), $imageName);

            // Delete old icon if exists
            if ($service->icon) {
                $oldIconPath = public_path('uploads/services/' . $service->icon);
                if (is_file($oldIconPath) && file_exists($oldIconPath)) {
                    @unlink($oldIconPath);
                }
            }

            $validated['icon'] = $imageName;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        if ($service->icon) {
            $iconPath = public_path('uploads/services/' . $service->icon);
            if (is_file($iconPath) && file_exists($iconPath)) {
                @unlink($iconPath);
            }
        }
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
