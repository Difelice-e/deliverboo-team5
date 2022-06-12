<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $total = $data['total'];
        $userId = $data['userId'];
        $cartInfo = $data['cartInfo'];
        $userInfo = $data['form'];
        
        // creazione nuovo ordine
        $order = new Order();
        $order->customer_name = $userInfo['customer_name'];
        $order->customer_phone = $userInfo['customer_phone'];
        $order->customer_email = $userInfo['customer_email'];
        $order->street_address = $userInfo['street_address'];
        $order->total_price = $total;
        $order->user_id = $userId;
        $order->delivered = false;  
        $order->payment_state = false;

        $order->save();
        
        // creazione dish_order
        foreach ($cartInfo as $dishInfo) {
            DB::table('dish_order')->insert([
                'dish_id' => $dishInfo['id'],
                'order_id' => $order->id,
                'quantity' => $dishInfo['quantity'],
            ]);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
