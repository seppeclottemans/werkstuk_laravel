<?php

namespace App\Http\Services;

use App\Item;
use App\OngoingRent;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function get(int $id){
        return User::where([['id', $id]])->first();
    }

    public function getMultiple($ids){
        return User::whereIn('id', $ids)->get();
    }

    public function getAllItems(int $userId){
       return Item::where('user_id', $userId)->paginate(9);
    }

    public function getAllOngoinRents(int $userId){
        return OngoingRent::where('renter_id', $userId)->paginate(9);
    }

    public function getAllOngoinRentals(int $userId){
        return OngoingRent::where('owner_id', $userId)->paginate(9);
    }
}
