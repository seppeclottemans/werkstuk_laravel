<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OngoingRent extends Model
{
    protected $fillable = ['owner_id', 'amount', 'date_from', 'date_to'];

    public function user(){
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

}
