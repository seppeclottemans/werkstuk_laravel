<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_link'];

    protected $table = 'item_images';

    public function item(){
        return $this->belongsTo(Item::class,
            'item_id',
            'items.id');
    }
}
