<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function items(){
        return $this->belongsToMany(Item::class,
            'category_item',
            'category_id',
            'item_id')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
