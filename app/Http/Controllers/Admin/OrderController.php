<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
        $query = Order::with(['user', 'items.service', 'address'])
            ->orderBy('created_at', 'desc');

        // Filter by status if provided
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Paginate results
        $orders = $query->paginate(15);

        // Get order statistics
        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'Pending')->count(),
            'confirmed' => Order::where('status', 'Confirmed')->count(),
            'in_progress' => Order::where('status', 'In Progress')->count(),
            'completed' => Order::where('status', 'Delivered')->count(),
        ];

        return view('admin.order.orders', compact('orders', 'stats'));
    }

    public function view($id)
    {
        $order = Order::with([
            'user', 
            'items.service', 
            'items.measurement', 
            'address',
            'measurement',
            'sampleClothing'
        ])->findOrFail($id);

        return view('admin.order.view', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,In Progress,Ready for Delivery,Delivered,Cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function pickup()
    {
        return view('admin.order.pickup');
    }
}
