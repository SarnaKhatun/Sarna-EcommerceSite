<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    use HasFactory;

    protected static $reply;

    public static function addReply($request)
    {
        self::$reply = new Reply();
        self::$reply->name = Auth::user()->name;
        self::$reply->user_id = Auth::user()->id;
        self::$reply->comment_id = $request->commentId;
        self::$reply->reply = $request->reply;
        self::$reply->save();
    }
}
