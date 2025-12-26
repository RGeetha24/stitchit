<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends Controller
{

    public function routeOptimize()
    {
        return view('admin.routeOptimize');
    }
}
