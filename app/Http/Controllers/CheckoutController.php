<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use DB;
use App\Mail\SendNewMail;
use App\Mail\SendMailRestaurant;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        $order = Order::orderBy('created_at','desc')->first();
        $total = $order['total_price'];

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51L8jshJ5wsVzR59fuA8sNP43VfD81HbtqzlggvMmAhfMLRlcwYWBkUKHRoXNP52QdikHOChFTsj9tKLtnH4Hxdqv00VEEk6ML8');
        		
		$amount = $total;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'EUR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent','total'));

    }

    public function afterPayment()
    {   
        $order = Order::orderBy('created_at','desc')->first();
        $ristoratore = User::where('id', $order->user_id)->first();
        $order['payment_state'] = true;
        $order->save();

        Mail::to($order['customer_email'])->send(new SendNewMail);
        Mail::to($ristoratore['email'])->send(new SendMailRestaurant);
        return view('checkout.success', compact('order','ristoratore'));

    }
}
