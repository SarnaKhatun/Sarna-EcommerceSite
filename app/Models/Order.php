<?php

namespace App\Models;

use App\Notifications\SendEmailNotifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Stripe;
use Notification;

class Order extends Model
{
    use HasFactory;
    use Notifiable;


    protected static $orders ;
    protected static $order ;

    public static function orderCash($userId)
    {
        $dataItem = Cart::where('user_id', $userId)->get();
        foreach ($dataItem as $data)
        {
            self::$order = new Order();
            self::$order->name = $data->name;
            self::$order->email = $data->email;
            self::$order->phone = $data->phone;
            self::$order->address = $data->address;
            self::$order->user_id = $data->user_id;
            self::$order->product_id = $data->product_id;
            self::$order->title = $data->title;
            self::$order->quantity = $data->quantity;
            self::$order->image = $data->image;
            self::$order->price = $data->price;
            self::$order->payment_status = 'Cash on delivery';
            self::$order->delivery_status = 'Processing';
            self::$order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
    }



    public static function stripePayment($request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment..."
        ]);

        $user = Auth::user()->id;
        $userId = $user;
        $dataItem = Cart::where('user_id', $userId)->get();
        foreach ($dataItem as $data)
        {
            self::$order = new Order();
            self::$order->name = $data->name;
            self::$order->email = $data->email;
            self::$order->phone = $data->phone;
            self::$order->address = $data->address;
            self::$order->user_id = $data->user_id;
            self::$order->product_id = $data->product_id;
            self::$order->title = $data->title;
            self::$order->quantity = $data->quantity;
            self::$order->image = $data->image;
            self::$order->price = $data->price;
            self::$order->payment_status = 'Paid';
            self::$order->delivery_status = 'Processing';
            self::$order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');
    }



    public static function orderDelivered ($id)
    {
        self::$order = Order::find($id);
//        self::$order->delivery_status = self::$order->delivery_status == 'Processing' ? 'Delivered' : 'Processing';
        self::$order->delivery_status = 'Delivered';
        self::$order->payment_status = 'Paid';
        self::$order->save();
    }



    public static function sendEmail($request, $id)
    {
        self::$order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send(self::$order, new SendEmailNotifications($details));
    }

}
