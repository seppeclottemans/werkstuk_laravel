<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\CategoryUserService;
use App\Http\Services\ImageService;
use App\Http\Services\ItemService;
use App\Http\Services\UserService;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ProfileService;

class UserController extends Controller
{


    private $profileService;
    private $categoryUserService;
    private $imageService;
    private $userService;
    private $itemService;
    private $categoryService;

    public function __construct(ProfileService $profileService, CategoryUserService $categoryUserService, ImageService $imageService, UserService $userService, ItemService $itemService, CategoryService $categoryService)
    {
        $this->profileService = $profileService;
        $this->categoryUserService = $categoryUserService;
        $this->imageService = $imageService;
        $this->userService = $userService;
        $this->itemService = $itemService;
        $this->categoryService = $categoryService;
    }

    // return views
    public function getInventoryPage(){
        $userId = Auth::id();
        $userInvetory = $this->userService->getAllItems($userId);
        return view('pages.inventory', ['userinvetory' => $userInvetory]);
    }

    public function getProfilePage(){
        $user = Auth::user();
        $userCategories = $this->categoryUserService->get($user);

        $categories = $this->categoryService->getAll();
        $userName = $user->name;
        return view('pages.profile', ['categories' => $categories, 'userName' => $userName, 'userCategories' => $userCategories]);
    }

    public function getOngoingRentsPage(){
        $userId = Auth::id();
        $ongoingRents = $this->userService->getAllOngoinRents($userId);


        return view('pages.ongoing-rents', ['ongoingRents' => $ongoingRents]);
    }

    public function getOngoingRentalsPage(){
        $userId = Auth::id();
        $ongoingRentals = $this->userService->getAllOngoinRentals($userId);

        return view('pages.ongoing-rentals', ['ongoingRentals' => $ongoingRentals]);
    }

    public function getAboutPage()
    {
        return view('pages.about');
    }

    public function updateProfile(ProfileRequest $request){
        $user = Auth::user();
        $this->profileService->update($request->name, $user);
        $this->categoryUserService->update($request->categories , $user);

        $newProfileImage = $request->file('profileImage');

        if ($newProfileImage !== null){
            if($user->image_link !== null){
                $this->imageService->removeOldProfileImage($user);
            }
            $this->imageService->setUserProfileImage($newProfileImage, $user);
        }

        return redirect()->route('home-page');
    }
}
