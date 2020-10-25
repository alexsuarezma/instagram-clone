<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    //RELACION ONE TO MANY // uno a muchos

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    //RELACION ONE TO MANY // uno a muchos

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    //RELACIÓN MANY TO ONE // muchos a uno

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    use HasFactory;
}
