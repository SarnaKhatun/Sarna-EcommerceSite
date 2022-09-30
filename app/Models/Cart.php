<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use function Termwind\ValueObjects\pr;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'product_id',
        'image',
        'title',
        'quantity',
        'price',
        'category_id',
    ];




    protected static $cart;

    public static function saveCartData($request, $product, $category)
    {
            self::$cart = new Cart();
            self::$cart->user_id = Auth::user()->id;
            self::$cart->name = Auth::user()->name;
            self::$cart->email = Auth::user()->email;
            self::$cart->phone = Auth::user()->phone;
            self::$cart->address = Auth::user()->address;
            self::$cart->product_id = $product->id;
            self::$cart->image = $product->image;
            self::$cart->title = $product->title;
            if ($product->dis_price != null)
            {
                self::$cart->price = $product->dis_price * $request->quantity;
            }
            else {
                self::$cart->price = $product->price * $request->quantity;
            }
            self::$cart->quantity = $request->quantity;
            self::$cart->category_id = $category->id;
            self::$cart->save();
        }


    public static function deleteCart($request,  $id)
    {
        self::$cart = Cart::find($id);
        if (file_exists(self::$cart->image))
        {
            unlink(self::$cart->image);
        }
        self::$cart->delete();
    }
}
