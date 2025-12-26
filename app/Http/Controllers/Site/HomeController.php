<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
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
    public function masterCategory($slug)
    {
        $masterCategory = MasterCategory::where('slug', $slug)
            ->with(['categories' => function($q) {
                $q->where('status', 1)->orderBy('sort_order');
            }])->firstOrFail();

        return view('site.main.topwear', compact('masterCategory'));
    }

    public function topwear()
    {
        return view('site.main.topwear');
    }
    
}
