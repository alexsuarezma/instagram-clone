<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    //RELACIÓN MANY TO ONE

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //RELACIÓN MANY TO ONE

    public function image(){
        return $this->belongsTo('App\Models\Image', 'user_id');
    }

    use HasFactory;
}
