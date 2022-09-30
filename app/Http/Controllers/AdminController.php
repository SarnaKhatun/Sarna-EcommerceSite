<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function manageCategory()
    {
        return view('admin.category.manage', [
            'categories' => Category::all(),
        ]);
    }

    public function editCategory($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id),
        ]);
    }

    public function newCategory (Request $request)
    {
        Category::saveCategoryData($request);
        return redirect()->back()->with('message', 'Category created successfully');
    }

    public function updateCategory (Request $request, $id)
    {
        Category::saveCategoryData($request, $id);
        return redirect('/manage-category')->with('message', 'Category updated successfully');
    }

    public function deleteCategory(Request $request, $id)
    {
        Category::deleteCategory($request, $id);
        return redirect()->back()->with('message', 'Category deleted successfully');
    }


    public function order ()
    {
        return view('admin.order.manage', [
            'orders' => Order::all(),
        ]);
    }

    public function delivered ($id)
    {
        Order::orderDelivered($id);
        return redirect('/order')->with('message', 'Order delivered successfully');
    }


    public function printw($id)
    {
        $pdf = PDF::loadView('admin.pdf.pdf', [
            'order' => Order::find($id),
        ]);
        return $pdf->download('Order_details.pdf');

    }

    public function sendEmail ($id)
    {
        return view('admin.email.email', [
            'order' => Order::find($id),
        ]);
    }

    public function userEmail (Request $request, $id)
    {
        Order::sendEmail($request, $id);
        return redirect('/order')->with('message', 'Send email successfully');
    }


    public function searchData (Request $request)
    {
        $searchText = $request->search;
        $orders = Order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('title', 'LIKE', "%$searchText%")->get();
        return view('admin.order.manage', [
           'orders' => $orders,
        ]);
    }
}
