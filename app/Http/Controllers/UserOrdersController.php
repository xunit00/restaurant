<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class UserOrdersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $orders = Order::with('status')->where('user_id', $user->id)->get();
        return view('orders.index', compact('user', 'orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'size' => 'required',
        ]);
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'size' => $request->size,
            'toppings' => implode(', ', $request->toppings),
            'instructions' => $request->instructions,
        ]);
        return redirect()->route('user.orders.show', $order)->with('message', 'Order received!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
