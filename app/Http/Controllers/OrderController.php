<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Eager load relationships for better performance
        $orders = Order::with(['customer', 'bouquet'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Retrieve customers and bouquets for the dropdown selection
        $customers = Customer::all();
        $bouquets  = Bouquet::all();
        return view('orders.create', compact('customers', 'bouquets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id'     => 'required|exists:customers,id',
            'bouquet_id'      => 'required|exists:bouquets,id',
            'order_date'      => 'required|date',
            'special_requests'=> 'nullable',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')
                         ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        // Load relationships if not eager loaded already
        $order->load(['customer', 'bouquet']);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $bouquets  = Bouquet::all();
        return view('orders.edit', compact('order', 'customers', 'bouquets'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id'     => 'required|exists:customers,id',
            'bouquet_id'      => 'required|exists:bouquets,id',
            'order_date'      => 'required|date',
            'special_requests'=> 'nullable',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')
                         ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
                         ->with('success', 'Order deleted successfully.');
    }
}
