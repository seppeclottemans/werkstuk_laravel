<?php

namespace App\Http\Services;

use App\Item;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use function GuzzleHttp\Promise\all;

class ItemService
{
    private $categoryItemService;

    public function __construct(CategoryItemService $categoryItemService)
    {
        $this->categoryItemService = $categoryItemService;
    }

    public function get($id){
        $item = Item::where('id', $id)->first();
        return $item;
    }

    public function getMultiple($ids){
        return Item::whereIn('id', $ids)->simplePaginate(9);
    }

    public function create(array $item, User $user)
    {
        $item = new Item([
            'title' => $item['title'],
            'description' => $item['description'],
            'current_amount' => $item['current_amount'],
            'total_amount' => $item['total_amount']
        ]);
        // get current user
        $item->user()->associate($user->id);
        $item->save();

        return $item;
    }

    public function update(array $newItem, int $itemId)
    {
        $item = Item::where('id', $itemId)->first();

            $item->update(
                ['title' => $newItem['title'],
                    'description' => $newItem['description'],
                    'current_amount' => $newItem['current_amount'],
                    'total_amount' => $newItem['total_amount']]
            );

            return $item;
    }

    public function delete(Item $item){
        $item_images = $item->images;

        // delete images
        collect($item_images->all())->each(function ($item_image) {
            File::delete($item_image->image_link);
            $item_image->delete();
        });

        // detach categories
        $this->categoryItemService->delete($item->categories()->get(), $item);

        // remove from ongoing rents
        $item->ongoingrents()->delete();

        $item->delete();
    }

    public function getItemsByUserPreference($userId){
        $categoryPreferenceIds = DB::table('category_user')->where('user_id', $userId)->pluck('category_id');

        $itemsToCollect = DB::table('category_item')->whereIn('category_id', $categoryPreferenceIds)->pluck('item_id')->unique();

        $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->orderBy('id', 'desc')->paginate(9);
        return $items;
    }
}
