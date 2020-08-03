<?php

namespace App\Http\Services;

use App\Item;
use App\Category;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class AdminService
{

    private $itemService;
    private $categoryUserService;

    public function __construct(ItemService $itemService, CategoryUserService $categoryUserService)
    {
        $this->itemService = $itemService;
        $this->categoryUserService = $categoryUserService;
    }

    public function getAllUsers(){
        return User::all();
    }

    public  function searchUserByName($userName){
        if ($userName ==! null) {
            return User::where('name', 'like', "%$userName%")->get();
        }
            return [];

    }

    public function makeAdmin(User $user){
        $user->is_admin = true;
        $user->save();
    }

    public function deleteUser(User $user){
        //delete all linked items
        foreach ($user->items()->get() as $item){
            $this->itemService->delete($item);
        }

        $this->categoryUserService->delete($user->categories()->get(), $user);


        // delete profile picture
        $image_link = $user->image_link;
        if ($image_link != null){
            File::delete($image_link);
        }

        $user->notifications()->delete();

        // delete user
        $user->delete();

    }
}
