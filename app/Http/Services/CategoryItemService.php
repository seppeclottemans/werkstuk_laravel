<?php

namespace App\Http\Services;

use App\Item;
use App\Category;
use Illuminate\Support\Collection;

class CategoryItemService
{

    public function create(Collection $categories, Item $item){
        $item->categories()->attach($categories);
    }

    public function update(array $categoryNames, Item $item){
        $selectedCategories = Category::whereIn('name', $categoryNames)->get();
        $oldCategories = $item->categories;
        $newCategories = $selectedCategories->diff($oldCategories);
        $CategoriesToDelete = $oldCategories->diff($selectedCategories);
        $this->delete($CategoriesToDelete, $item);
        $this->create($newCategories, $item);
    }

    public function delete(Collection $CategoriesToDelete, Item $item){
        $item->categories()->detach($CategoriesToDelete);
    }
}
