<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    public function faq()
    {
        return view('site.extras.faq');
    }

    public function about()
    {
        return view('site.extras.about');
    }

    public function notification()
    {
        return view('site.extras.notification');
    }
}
