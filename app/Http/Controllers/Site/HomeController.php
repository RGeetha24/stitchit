<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $masterCategories = MasterCategory::where('status', 1)->get();
        return view('site.index', compact('masterCategories'));
    }

    /**
     * Show a master category and its categories by slug.
     */
    public function masterCategory($masterSlug)
    {
        $masterCategory = MasterCategory::where('slug', $masterSlug)
            ->with(['categories' => function($q) {
                $q->where('status', 1)->orderBy('sort_order');
            }])->firstOrFail();

        return view('site.main.topwear', compact('masterCategory'));
    }

    /**
     * Show services for a specific category.
     */
    public function categoryServices($masterSlug, $categorySlug)
    {
        $masterCategory = MasterCategory::where('slug', $masterSlug)
            ->with(['categories' => function($q) {
                $q->where('status', 1)->orderBy('sort_order');
            }])->firstOrFail();

        $selectedCategory = Category::where('slug', $categorySlug)
            ->where('master_category_id', $masterCategory->id)
            ->where('status', 1)
            ->firstOrFail();

        $services = Service::where('category_id', $selectedCategory->id)
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view('site.main.topwear', compact('masterCategory', 'selectedCategory', 'services'));
    }

    public function topwear()
    {
        return view('site.main.topwear');
    }
    
}
