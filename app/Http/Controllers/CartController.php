<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    protected static $user;
    protected static $product;
    protected static $category;

    public function addCart(Request $request, $id)
    {
        if (Auth::id())
        {
            self::$product = Product::find($id);
            self::$category = Category::find($id);
           Cart::saveCartData($request, self::$product, self::$category);
//           return redirect()->back()->with('message', 'Product added to cart successfully');
            Alert::success('Product added successfully', 'We have added product to the cart');
            return redirect()->back();
        }
        else {
            return redirect('/login');
        }
    }
}
