<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderHistory()
    {
        return view('site.order.history');
    }

    public function orderDetails($id)
    {
        // You can use the $id parameter to fetch order details from the database
        return view('site.order.details', compact('id'));
    }

    public function feedback($id)
    {
        // You can use the $id parameter to fetch order details for feedback
        return view('site.order.feedback', compact('id'));
    }

    public function trackOrder($id)
    {
        // You can use the $id parameter to fetch order tracking information
        return view('site.order.track', compact('id'));
    }

    public function cart()
    {
        return view('site.order.cart');
    }

}
