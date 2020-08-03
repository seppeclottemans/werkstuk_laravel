<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'description', 'current_amount', 'total_amount'];

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function images(){
        return $this->hasMany(Image::class,
            'item_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ongoingrents(){
        return $this->hasMany(OngoingRent::class);
    }
}
