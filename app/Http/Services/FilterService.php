<?php

namespace App\Http\Services;

use App\Item;
use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;

class FilterService
{
    public function filterByChosenCategories(array $categoryNames, string $sort, int $userId){
        $categoryIds = Category::whereIn('name', $categoryNames)->pluck('id');

        $itemsToCollect = DB::table('category_item')->whereIn('category_id', $categoryIds)->pluck('item_id')->unique();

        $items = new Collection;
        switch ($sort) {
            case "most_recent": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->orderBy('id', 'desc')->paginate(9);
            break;

            case "oldest": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->orderBy('id', 'asc')->paginate(9);
            break;

            case "title_asc": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->orderBy('title', 'asc')->paginate(9);
            break;

            case "title_desc": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->orderBy('title', 'desc')->paginate(9);
            break;
        }

        // add full url with query to pagination
        $items->withPath(url()->full());

        return $items;
    }


    public function search(string $search, array $categoryNames, string $sort, int $userId){
        $categoryIds = Category::whereIn('name', $categoryNames)->pluck('id');

        $itemsToCollect = DB::table('category_item')->whereIn('category_id', $categoryIds)->pluck('item_id')->unique();

        $items = new Collection;
        switch ($sort) {
            case "most_recent": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->where(function ($query)  use ($search) {
                $query->where('title' , 'like', "%$search%")
                      ->orWhere('description' , 'like', "%$search%");
            })->orderBy('id', 'desc')->paginate(9);
                break;

            case "oldest": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->where(function ($query)  use ($search) {
                $query->where('title' , 'like', "%$search%")
                      ->orWhere('description' , 'like', "%$search%");
            })->orderBy('id', 'asc')->paginate(9);
                break;

            case "title_asc": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->where(function ($query)  use ($search) {
                $query->where('title' , 'like', "%$search%")
                      ->orWhere('description' , 'like', "%$search%");
            })->orderBy('title', 'asc')->paginate(9);
                break;

            case "title_desc": $items = Item::whereIn('id', $itemsToCollect)->where([['user_id', '!=', $userId], ['current_amount', '>', 0]])->where(function ($query)  use ($search) {
                $query->where('title' , 'like', "%$search%")
                      ->orWhere('description' , 'like', "%$search%");
            })->orderBy('title', 'desc')->paginate(9);
                break;
        }

        // add full url with query to pagination
        $items->withPath(url()->full());

        return $items;
    }

}
