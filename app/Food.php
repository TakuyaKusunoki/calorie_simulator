<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['user_id', 'name', 'calorie', 'eat_date'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
