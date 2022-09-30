<?php


namespace App\Helper;


use Illuminate\Support\Str;

class Helper
{
    protected static $image;
    protected static $imageName;
    protected static $imageUrl;

    public static function imageUpload($image, $directory, $modelImagePath = null)
    {
        if ($image)
        {
            if (isset($modelImagePath))
            {
                if (file_exists($modelImagePath))
                {
                    unlink($modelImagePath);
                }
            }

            self::$imageName = Str::random(10).'.'.$image->getClientOriginalExtension();
            $image->move($directory, self::$imageName);
            self::$imageUrl = $directory.self::$imageName;
        }
        else {
            self::$imageUrl = $modelImagePath;
        }

        return self::$imageUrl;
    }
}
