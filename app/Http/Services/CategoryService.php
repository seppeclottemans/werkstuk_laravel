<?php

namespace App\Http\Services;

use App\Item;
use App\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    public function getbyNames(array $names){
        return Category::whereIn('name', $names)->get();
    }

    public function getAll(){
        return Category::orderBy('name')->select('name')->get();
    }

}
