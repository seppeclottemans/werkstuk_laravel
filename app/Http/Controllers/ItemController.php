<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ItemRequest;
use App\Http\Services\CategoryItemService;
use App\Http\Services\CategoryService;
use App\Http\Services\ImageService;
use App\Http\Services\ItemService;
use App\Item;
use App\Image;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Gate;


class ItemController extends Controller
{
    // services
    private $itemService;
    private $imageService;
    private $categoryItemService;
    private $categoryService;

    public function __construct(ItemService $itemService, ImageService $imageService, CategoryItemService $categoryItemService, CategoryService $categoryService)
    {
        $this->itemService = $itemService;
        $this->imageService = $imageService;
        $this->categoryItemService = $categoryItemService;
        $this->categoryService = $categoryService;
    }

    // return views
    public function getAddNewItemPage()
    {
        $categories = $this->categoryService->getAll();
        return view('pages.add-item', ['categories' => $categories]);
    }

    public function getEditItemPage($itemId){
        $item = $this->itemService->get($itemId);

        if (Gate::allows('edit-item', [$item])) {
            $categories = $this->categoryService->getAll();

            $itemCategories = [];
            foreach ($item->categories->all() as $category) {
                array_push($itemCategories, $category->name);
            }

            return view('pages.edit-item', ['item' => $item, 'categories' => $categories, 'itemCategories' => $itemCategories]);
        }else{
            return view('pages.unauthorized');
        }
    }

    public function getInfoItemPage($itemId){
        $item = $this->itemService->get($itemId);
            $categories = $this->categoryService->getAll();

            $itemCategories = [];
            foreach ($item->categories->all() as $category) {
                array_push($itemCategories, $category->name);
            }

            return view('pages.item-info', ['item' => $item, 'categories' => $categories, 'itemCategories' => $itemCategories]);

    }


    // create
    public function uploadItem(ItemRequest $request)
    {
        $user = Auth::user();
        $item = $this->itemService->create($request->getItem(), $user);

        // save images
        $images = $request->file('images');
        $this->imageService->create($images, $item);

        // save categories
        $categoryNames = $request->categories;
        $categories = $this->categoryService->getbyNames($categoryNames);
        $this->categoryItemService->create($categories, $item);

        return redirect()->route('inventory-page');
    }

    // update
    public function updateItem(int $itemId, ItemRequest $request){
        $itemToUpdate = $this->itemService->get($itemId);

        if (Gate::allows('update-item', [$itemToUpdate])) {
            $userId = Auth::id();
            $item = $this->itemService->update($request->getItem(), $itemId, $userId);

            //delete images
            $imagesIdsToDelete = array_map('intval', explode(',', $request->imagesToDelete));
            $imagesToDelete = $this->imageService->getMultipleById($imagesIdsToDelete);

            $categories = $request->categories;
            $this->categoryItemService->update($categories, $item);

            if (Gate::allows('delete-images', [$imagesToDelete, $item])) {
                $this->imageService->delete($imagesToDelete, $item);

                // save new images
                $images = $request->file('images');
                $this->imageService->create($images, $item);
            }

            return redirect()->route('inventory-page');
        }else{
            return view('pages.unauthorized');
        }
    }

    // delete
    public function deleteItem(int $itemId, Request $request) {
        $item = $this->itemService->get($itemId);

        if (Gate::allows('delete-item', [$item])) {
            $this->itemService->delete($item);

            return redirect()->back();
        }else{
            return view('pages.unauthorized');
        }
    }
}
