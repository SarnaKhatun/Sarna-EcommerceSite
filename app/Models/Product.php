<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'price',
        'dis_price',
        'quantity',
    ];


    protected static $product;


    public static function saveProductData($request, $id = null)
    {
        Product::updateOrCreate(['id' => $id], [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => Helper::imageUpload($request->file('image'), 'product/img/', isset($id) ? Product::where('id', $id)->first()->image : null),
            'price' => $request->price,
            'dis_price' => $request->dis_price,
            'quantity' => $request->quantity,
        ]);
    }

    public static function deletePro($request, $id)
    {
         self::$product = Product::find($id);
         if (file_exists(self::$product->image))
         {
             unlink(self::$product->image);
         }
         self::$product->delete();
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
