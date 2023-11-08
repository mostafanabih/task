<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    public $timestamps = true;
    protected $fillable = array('title','content','user_id');

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}