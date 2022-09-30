<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;



class StripeController extends Controller
{

    protected static $order;


    public function stripe($totalPrice)
    {
        return view('front.stripe.stripe', [
            'totalPrice' => $totalPrice,
        ]);
    }

    public function stripePost(Request $request, $totalPrice)
    {
        Order::stripePayment($request, $totalPrice);
        return back();
    }
}
