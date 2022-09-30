<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('admin.product.add', [
            'categories' => Category::all(),
        ]);
    }

    public function newProduct(Request $request)
    {
        Product::saveProductData($request);
        return back()->with('message', 'Product created successfully');
    }

    public function manageProduct ()
    {
        return view('admin.product.manage', [
            'products' => Product::all(),
        ]);
    }

    public function editProduct($id)
    {
        return view('admin.product.edit', [
            'categories' => Category::all(),
            'product' => Product::find($id),
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        Product::saveProductData($request, $id);
        return redirect('/manage-product')->with('message', 'Product updated successfully');
    }

    public function deleteProduct(Request $request, $id)
    {
        Product::deletePro($request, $id);
        return back()->with('message', 'Product deleted successfully');
    }
}
