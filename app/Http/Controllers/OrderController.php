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
            'bouquet_id' => 'required|exists:bouquets,id',
            'special_requests' => 'nullable|string',
            'phone' => 'required|string',
            'delivery_method' => 'required|in:delivery,pickup',
            'address' => 'required_if:delivery_method,delivery|nullable|string',
            'pickup_date' => 'nullable|date',
            'pickup_time' => 'nullable',
        ]);
    
        $user = auth()->user();
    
        // Check if the user already exists in the customers table
        $customer = Customer::where('user_id', $user->id)->first();
    
        if (!$customer) {
            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = $user->name;
            $customer->email = $user->email;
        }
    
        // Always update phone/address in case user updates them when ordering
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();
    
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->bouquet_id = $validated['bouquet_id'];
        $order->order_date = now();
        $order->special_requests = $validated['special_requests'];
        $order->delivery_method = $validated['delivery_method'];
        $order->pickup_date = $request->input('pickup_date');
        $order->pickup_time = $request->input('pickup_time');
        
        if ($request->input('delivery_method') === 'pickup') {
            $order->pickup_date = $request->input('pickup_date');
            $order->pickup_time = $request->input('pickup_time');
        }
        
        $order->save();

        if ($request->input('delivery_method') === 'pickup') {
            $order->pickup_date = $request->input('pickup_date');
            $order->pickup_time = $request->input('pickup_time');
        }
        
    
        return redirect()->route('bouquets.shop')->with('success', 'Your order has been placed!');
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
            'special_requests'=> 'nullable|string',
            'delivery_method' => 'required|in:delivery,pickup',
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
