<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        return view('admin.order.orders');
    }

    public function pickup()
    {
        return view('admin.order.pickup');
    }
}
