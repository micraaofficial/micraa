<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store($service_id)
    {
        $service = Service::findOrFail($service_id);

        // Calculate Micraa commission (10%)
        $commission = $service->price * 0.10;

        // Seller earning after commission
        $sellerEarning = $service->price - $commission;

        Order::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $service->user_id,
            'service_id' => $service->id,
            'price' => $service->price,
            'commission' => $commission,
            'seller_earning' => $sellerEarning,
            'status' => 'pending'
        ]);

        return redirect('/services')->with('success','Order placed successfully');
    }

    public function myOrders()
    {
        $orders = Order::with('service')
            ->where('buyer_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.my-orders', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
