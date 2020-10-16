<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
    
    public function userFollowed(){
        return $this->belongsTo('App\Models\User', 'user_id_followed');
    }

    public function userFollowers(){
        return $this->belongsTo('App\Models\User', 'user_id_follower');
    }

    use HasFactory;
}
