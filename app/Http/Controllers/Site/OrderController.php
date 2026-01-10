<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderHistory()
    {
        $orders = Order::with(['items.service', 'address'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('site.order.history', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with(['items.service', 'address', 'user'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);
        
        return view('site.order.details', compact('order'));
    }

    public function feedback($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        
        return view('site.order.feedback', compact('order'));
    }

    public function trackOrder($id)
    {
        $order = Order::with(['items', 'address'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);
        
        return view('site.order.track', compact('order'));
    }

    public function cart()
    {
        return view('site.order.cart');
    }

}
