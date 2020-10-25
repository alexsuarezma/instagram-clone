<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function userSend(){
        return $this->belongsTo('App\Models\User', 'user_id_emisor');
    }

    public function chat(){
        return $this->belongsTo('App\Models\Chat', 'chat_id');
    }


    use HasFactory;
}
