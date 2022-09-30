<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_name',
    ];

    public static function saveCategoryData($request, $id = null)
    {
        Category::updateOrCreate(['id'=> $id], [
            'category_name' => $request->category_name
        ]);
    }

    public static function deleteCategory($request, $id)
    {
        Category::find($id)->delete();
    }
}
