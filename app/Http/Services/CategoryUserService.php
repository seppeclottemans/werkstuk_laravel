<?php

namespace App\Http\Services;

use App\User;
use App\Category;
use Illuminate\Support\Collection;

class CategoryUserService
{
    public function get(User $user){
        $userCategories = [];
        foreach ($user->categories->all() as $category) {
            array_push($userCategories, $category->name);
        }
        return $userCategories;
    }

    public function create(Collection $categories, User $user){
        $user->categories()->attach($categories);
    }

    public function update(array $categoryNames, User $user){
        $selectedCategories = Category::whereIn('name', $categoryNames)->get();
        $oldCategories = $user->categories;
        $newCategories = $selectedCategories->diff($oldCategories);
        $CategoriesToDelete = $oldCategories->diff($selectedCategories);
        $this->delete($CategoriesToDelete, $user);
        $this->create($newCategories, $user);
    }

    public function delete(Collection $CategoriesToDelete, User $user){
        $user->categories()->detach($CategoriesToDelete);
    }
}
