<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function financial()
    {
        return view('admin.revenue.financial');
    }

    public function report()
    {
        return view('admin.revenue.report');
    }
}
