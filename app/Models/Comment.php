<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //RELACIÓN MANY TO ONE

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //RELACIÓN MANY TO ONE

    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }

    use HasFactory;
}
