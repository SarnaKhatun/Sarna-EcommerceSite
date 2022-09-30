<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected static $comment;

    public static function addComment ($request, $userID)
    {


        self::$comment = new Comment();
        self::$comment->name = Auth::user()->name;
        self::$comment->user_id = $userID;
        self::$comment->comment = $request->comment;
        self::$comment->save();
    }
}
