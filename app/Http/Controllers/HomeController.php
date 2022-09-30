<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    protected $userType;
    protected $carts;
    protected static $order;

    public function index()
    {
        return view('front.home.home', [
//            'products' => Product::latest()->take(9)->get(),
            'products' => Product::paginate(3),
            'comments' => Comment::orderBy('id', 'DESC')->get(),
            'replies' => Reply::all(),
        ]);
    }

    public function redirect ()
    {
        $this->userType = Auth::user()->user_type;
        if ($this->userType == 1)
        {
            $orders = Order::all();
            $totalRevenue = 0;
            foreach ($orders as $order)
            {
                $totalRevenue = $totalRevenue + $order->price;
            }

            $totalDelivered = Order::where('delivery_status', 'Delivered')->get()->count();
            $totalProcessing = Order::where('delivery_status', 'Processing')->get()->count();
            return view('admin.home.home',[
                'totalProduct' => Product::all()->count(),
                'totalOrder' => Order::all()->count(),
                'totalCustomer' => User::all()->count(),
                'totalRevenue' => $totalRevenue,
                'totalDelivery' => $totalDelivered,
                'totalProcessing' => $totalProcessing,

            ]);
        }
        else {
            return view('front.home.home', [
//                'products' => Product::latest()->take(9)->get(),
                'products' => Product::paginate(3),
                'comments' => Comment::latest(),
                'replies' => Reply::all(),
            ]);
        }
    }


    public function detailsProduct ($id)
    {
        return view('front.product.details', [
            'product' => Product::find($id),
        ]);
    }


    public function showCart ()
    {
        if (Auth::id())
        {
//            $id = Auth::user()->id;
//            $this->carts = Cart::where('user_id', $id)->get();
//            return  view('front.cart.showCart', [
//                'carts' => $this->carts,
//            ]);


            return  view('front.cart.showCart', [
                'carts' => Cart::where('user_id', Auth::id())->get(),
            ]);
        }
        else {
            return redirect('login');
        }

    }


    public function removeCart(Request $request, $id)
    {
        Cart::deleteCart($request, $id);
        return redirect()->back()->with('message', 'Product removed successfully from this cart');
    }


    public function cashOrder ()
    {
        $user = Auth::user()->id;
        $userId = $user;
        Order::orderCash($userId);
        return back()->with('message', 'Wev have received your order. We will contact with you soon...........');
    }


    public function showOrder ()
    {
       if (Auth::id())
       {
           $user = Auth::user()->id;
           $orders = Order::where('user_id', $user)->get();
           return view('front.home.order', [
               'orders' => $orders,
           ]);
       }
       return redirect('/login');
    }

    public function cancelOrder ($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'You canceled the order';
        $order->save();
        return redirect()->back();
    }


    public function addComment (Request $request)
    {
        if (Auth::id())
        {
            $user = Auth::user()->id;
            $userID = $user;
            Comment::addComment($request, $userID);
            return redirect()->back()->with('message', 'Comments send successfully');
        }
        else {
            return redirect('/login');
        }
    }

    public function addReply (Request $request)
    {
        if (Auth::id())
        {
            Reply::addReply($request);
            return redirect()->back()->with('message','Comment reply successfully');
        }
        else {
            return redirect('/login');
        }
    }

    public function productSearch(Request $request)
    {
        $searchProduct = $request->search;
        $products = Product::where('title', 'LIKE', "%$searchProduct%")->orWhere('description', 'LIKE', $searchProduct)->paginate(4);
        return view('front.home.home', [
            'products' => $products,
            'comments' => Comment::orderBy('id', 'DESC')->get(),
            'replies' => Reply::all(),
        ]);

    }

    public function productAll()
    {
        return view('front.product.all', [
            'products' => Product::paginate(10),

        ]);
    }


    public function searchProduct(Request $request)
    {
        $searchProduct = $request->search;
        $products = Product::where('title', 'LIKE', "%$searchProduct%")->orWhere('description', 'LIKE', $searchProduct)->paginate(4);
        return view('front.product.all', [
            'products' => $products,
            'comments' => Comment::orderBy('id', 'DESC')->get(),
            'replies' => Reply::all(),
        ]);

    }

}
