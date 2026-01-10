<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Measurement;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MeasurementController extends Controller
{
    public function measurementOptions()
    {
        return view('site.measurement.measurementOptions');
    }

    public function garmentDetails()
    {
        return view('site.measurement.garmentDetails');
    }

    public function manualMeasurement()
    {
        // Load user's existing measurements if any
        $measurements = auth()->check() 
            ? Measurement::where('user_id', auth()->id())->latest()->get()
            : collect();
        
        $defaultMeasurement = $measurements->where('is_default', true)->first() 
            ?? $measurements->first();

        return view('site.measurement.manualMeasurement', compact('measurements', 'defaultMeasurement'));
    }

    /**
     * Save manual measurements
     */
    public function saveMeasurement(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to save measurements'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'measurement_name' => 'nullable|string|max:255',
            'garment_type' => 'nullable|in:Blouse,Kurti,Shirt,Pant,Suit,Other',
            'neck' => 'nullable|numeric|min:0|max:100',
            'shoulder' => 'nullable|numeric|min:0|max:100',
            'front_bodice' => 'nullable|numeric|min:0|max:100',
            'upper_bust' => 'nullable|numeric|min:0|max:100',
            'back_bodice' => 'nullable|numeric|min:0|max:100',
            'bust' => 'nullable|numeric|min:0|max:100',
            'lower_bust' => 'nullable|numeric|min:0|max:100',
            'waist' => 'nullable|numeric|min:0|max:100',
            'full_arm_length' => 'nullable|numeric|min:0|max:100',
            'arm_size' => 'nullable|numeric|min:0|max:100',
            'half_arm_length' => 'nullable|numeric|min:0|max:100',
            'wrist' => 'nullable|numeric|min:0|max:100',
            'thigh' => 'nullable|numeric|min:0|max:100',
            'knee' => 'nullable|numeric|min:0|max:100',
            'waist_to_ankle_length' => 'nullable|numeric|min:0|max:100',
            'inside_leg_length' => 'nullable|numeric|min:0|max:100',
            'hip_to_knee_length' => 'nullable|numeric|min:0|max:100',
            'ankle' => 'nullable|numeric|min:0|max:100',
            'hip_to_ankle_length' => 'nullable|numeric|min:0|max:100',
            'arm_hole' => 'nullable|numeric|min:0|max:100',
            'hip' => 'nullable|numeric|min:0|max:100',
            'is_default' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if user has an existing default measurement
        $existingMeasurement = Measurement::where('user_id', auth()->id())
            ->where('is_default', true)
            ->first();

        $measurementData = [
            'user_id' => auth()->id(),
            'measurement_name' => $request->measurement_name ?? 'My Measurements',
            'garment_type' => $request->garment_type,
            'neck' => $request->neck,
            'shoulder' => $request->shoulder,
            'front_bodice' => $request->front_bodice,
            'upper_bust' => $request->upper_bust,
            'back_bodice' => $request->back_bodice,
            'bust' => $request->bust,
            'lower_bust' => $request->lower_bust,
            'waist' => $request->waist,
            'full_arm_length' => $request->full_arm_length,
            'arm_size' => $request->arm_size,
            'half_arm_length' => $request->half_arm_length,
            'wrist' => $request->wrist,
            'thigh' => $request->thigh,
            'knee' => $request->knee,
            'waist_to_ankle_length' => $request->waist_to_ankle_length,
            'inside_leg_length' => $request->inside_leg_length,
            'hip_to_knee_length' => $request->hip_to_knee_length,
            'ankle' => $request->ankle,
            'hip_to_ankle_length' => $request->hip_to_ankle_length,
            'arm_hole' => $request->arm_hole,
            'hip' => $request->hip,
            'is_default' => $request->is_default ?? false,
        ];

        if ($existingMeasurement) {
            // Update existing measurement
            $existingMeasurement->update($measurementData);
            $measurement = $existingMeasurement;
        } else {
            // Create new measurement
            $measurement = Measurement::create($measurementData);
        }

        // Store measurement ID in session for checkout
        session(['selected_measurement_id' => $measurement->id]);
        session(['measurement_method' => 'Manual']);

        return response()->json([
            'success' => true,
            'message' => 'Measurements saved successfully!',
            'data' => $measurement,
            'redirect' => route('checkout')
        ]);
    }

    /**
     * Get user's saved measurements
     */
    public function getMeasurements()
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $measurements = Measurement::where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $measurements
        ]);
    }

    public function fitSampleCloth()
    {
        return view('site.measurement.fitSampleCloth');
    }

    /**
     * Save sample clothing request with images
     */
    public function saveSampleClothing(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to submit sample clothing'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'special_instructions' => 'nullable|string|max:1000',
                'images' => 'nullable|array|max:10',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max per image
                'sample_instructions' => 'nullable|string|max:1000',
                'sample_images' => 'nullable|array|max:10',
                'sample_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'quantity' => 'nullable|integer|min:1|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle original garment image uploads
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('sample_clothing', $filename, 'public');
                    $imagePaths[] = $path;
                }
            }

            // Handle sample garment image uploads
            $sampleImagePaths = [];
            if ($request->hasFile('sample_images')) {
                foreach ($request->file('sample_images') as $image) {
                    $filename = time() . '_sample_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('sample_clothing', $filename, 'public');
                    $sampleImagePaths[] = $path;
                }
            }

            // Combine all data for storage
            $allImages = array_merge($imagePaths, $sampleImagePaths);

            $sampleClothing = \App\Models\SampleClothing::create([
                'user_id' => auth()->id(),
                'garment_type' => 'Other', // Since we don't have a dropdown, use 'Other'
                'clothing_description' => $request->special_instructions,
                'images' => $allImages,
                'pickup_date' => null, // Will be set in next step
                'time_slot' => null, // Will be set in next step
                'status' => 'Pending Pickup',
                'special_notes' => $request->sample_instructions,
            ]);

            // Store sample clothing ID in session for checkout
            session(['selected_sample_clothing_id' => $sampleClothing->id]);
            session(['measurement_method' => 'Sample Clothing']);
            session(['sample_clothing_quantity' => $request->quantity ?? 1]);

            return response()->json([
                'success' => true,
                'message' => 'Sample clothing details saved successfully!',
                'data' => $sampleClothing
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Sample Clothing Save Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving: ' . $e->getMessage(),
                'error' => $e->getMessage(),
                'trace' => config('app.debug') ? $e->getTraceAsString() : null
            ], 500);
        }
    }

    public function alterationInstruction()
    {
        return view('site.measurement.alterationInstruction');
    }

    public function checkout()
    {
        // Get the current user's cart or session cart
        $cart = null;
        $cartItems = collect();
        $subtotal = 0;
        $originalTotal = 0;
        $discount = 0;
        $taxesAndFees = 0;
        $totalAmount = 0;
        
        if (auth()->check()) {
            // Get authenticated user's cart
            $cart = Cart::where('user_id', auth()->id())
                       ->with(['items.service'])
                       ->first();
        } else {
            // Get guest cart by session
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)
                       ->with(['items.service'])
                       ->first();
        }
        
        if ($cart && $cart->items->count() > 0) {
            $cartItems = $cart->items;
            
            // Calculate totals
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            
            // Mock calculations - adjust based on your business logic
            $originalTotal = $subtotal * 1.22; // Assume 22% discount from original
            $discount = $originalTotal - $subtotal;
            $taxesAndFees = $subtotal * 0.18; // Assume 18% tax
            $totalAmount = $subtotal + $taxesAndFees;
        }
        
        // Number of available offers/coupons
        $availableOffers = 2; // This can be made dynamic based on your coupons table
        
        // Get user's saved addresses
        $addresses = collect();
        if (auth()->check()) {
            $addresses = Address::where('user_id', auth()->id())
                               ->orderBy('is_default', 'desc')
                               ->orderBy('created_at', 'desc')
                               ->get();
        }
        
        // Generate dynamic time slots
        $timeSlots = [
            ['start' => '09:00', 'end' => '11:00', 'label' => '9 AM - 11 AM'],
            ['start' => '11:00', 'end' => '13:00', 'label' => '11 AM - 1 PM'],
            ['start' => '13:00', 'end' => '15:00', 'label' => '1 PM - 3 PM'],
            ['start' => '15:00', 'end' => '17:00', 'label' => '3 PM - 5 PM'],
            ['start' => '17:00', 'end' => '19:00', 'label' => '5 PM - 7 PM'],
        ];
        
        // Generate pickup date options (next 7 days)
        $pickupDates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = now()->addDays($i);
            $pickupDates[] = [
                'date' => $date->format('Y-m-d'),
                'label' => $i === 0 ? 'Today' : ($i === 1 ? 'Tomorrow' : $date->format('D, M j')),
                'full_date' => $date->format('l, F j, Y'),
            ];
        }
        
        return view('site.measurement.checkout', compact(
            'cartItems',
            'subtotal',
            'originalTotal',
            'discount',
            'taxesAndFees',
            'totalAmount',
            'availableOffers',
            'addresses',
            'timeSlots',
            'pickupDates'
        ));
    }

    /**
     * Save a new address
     */
    public function saveAddress(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to save address'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'nullable|email|max:255',
                'house_no' => 'required|string|max:500',
                'locality' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'nullable|string|max:100',
                'pincode' => 'required|string|max:10',
                'landmark' => 'nullable|string|max:255',
                'address_type' => 'required|in:Home,Office,Other',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
                'is_default' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // If setting as default, unset other default addresses
            if ($request->is_default) {
                Address::where('user_id', auth()->id())
                       ->update(['is_default' => false]);
            }

            $address = Address::create([
                'user_id' => auth()->id(),
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'house_no' => $request->house_no,
                'locality' => $request->locality,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'landmark' => $request->landmark,
                'address_type' => $request->address_type,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'is_default' => $request->is_default ?? false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Address saved successfully!',
                'data' => $address
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Address Save Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving address: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Place a new order
     */
    public function placeOrder(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to place order'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'address_id' => 'required|exists:addresses,id',
                'pickup_date' => 'required|date',
                'pickup_time' => 'required',
                'time_slot' => 'required|string',
                'expected_delivery_date' => 'required|date',
                'fast_delivery' => 'nullable|boolean',
                'payment_method' => 'required|in:upi,card',
                'payment_screenshot' => 'nullable|file|mimes:jpg,jpeg,png|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->first();
            
            if (!$cart || $cart->items->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your cart is empty'
                ], 400);
            }

            // Calculate totals
            $subtotal = $cart->items->sum(function($item) {
                return $item->price * $item->quantity;
            });
            $taxesAndFees = $subtotal * 0.18;
            $fastDeliveryCharge = $request->fast_delivery ? 50 : 0;
            $totalAmount = $subtotal + $taxesAndFees + $fastDeliveryCharge;

            // Handle payment screenshot upload
            $paymentScreenshotPath = null;
            if ($request->hasFile('payment_screenshot')) {
                $paymentScreenshotPath = $request->file('payment_screenshot')->store('payment_screenshots', 'public');
            }

            // Generate unique order number
            $orderNumber = 'ORD-' . strtoupper(uniqid());

            // Create order
            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $user->id,
                'address_id' => $request->address_id,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'time_slot' => $request->time_slot,
                'expected_delivery_date' => $request->expected_delivery_date,
                'fast_delivery' => $request->fast_delivery ?? false,
                'payment_method' => strtoupper($request->payment_method),
                'payment_screenshot' => $paymentScreenshotPath,
                'subtotal' => $subtotal,
                'tax' => $taxesAndFees,
                'delivery_charge' => $fastDeliveryCharge,
                'total' => $totalAmount,
                'status' => 'Pending',
                'payment_status' => 'Pending'
            ]);

            // Create order items from cart
            foreach ($cart->items as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'service_id' => $cartItem->service_id,
                    'item_name' => $cartItem->service->name ?? 'Service',
                    'item_description' => $cartItem->notes,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->price,
                    'total_price' => $cartItem->price * $cartItem->quantity,
                    'alteration_details' => $cartItem->notes ? json_encode(['notes' => $cartItem->notes]) : null
                ]);
            }

            // Clear cart after successful order
            $cart->items()->delete();
            $cart->delete();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully',
                'order' => [
                    'order_number' => $order->order_number,
                    'id' => $order->id,
                    'total_amount' => $order->total
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Order placement error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to place order: ' . $e->getMessage()
            ], 500);
        }
    }
}
