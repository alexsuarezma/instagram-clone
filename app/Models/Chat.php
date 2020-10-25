<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    //RELACION ONE TO MANY // uno a muchos
    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function userOne(){
        return $this->belongsTo('App\Models\User', 'user_id_one');
    }

    public function userTwo(){
        return $this->belongsTo('App\Models\User', 'user_id_two');
    }

    use HasFactory;
}
