<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\FilterRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\CategoryUserService;
use App\Http\Services\FilterService;
use App\Http\Services\ItemService;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $categoryUserService;
    private $categoryService;
    private $itemService;
    private $filterService;

    public function __construct(CategoryUserService $categoryUserService, CategoryService $categoryService, ItemService $itemService, FilterService $filterService)
    {
        $this->middleware('auth');
        $this->categoryUserService = $categoryUserService;
        $this->categoryService = $categoryService;
        $this->itemService = $itemService;
        $this->filterService = $filterService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getindex()
    {
        $userId = Auth::id();
        $items = $this->itemService->getItemsByUserPreference($userId);
        $user = Auth::user();
        $userCategories = $this->categoryUserService->get($user);

        $categories = $this->categoryService->getAll();

        return view('pages.home', ['items' => $items, 'userCategories' => $userCategories, 'categories' => $categories ]);
    }

    public function searchItem(FilterRequest $request){

        $userId = Auth::id();

        if ($request->search !== null){
            $items = $this->filterService->search($request->search, $request->categories, $request->sort, $userId);
        }else{
            $items = $this->filterService->filterByChosenCategories($request->categories, $request->sort, $userId);
        }

        $categories = $this->categoryService->getAll();

        return view('pages.home', ['items' => $items, 'userCategories' => $request->categories, 'categories' => $categories, 'search' => $request->search ]);
    }

    public function filterItems(FilterRequest $request){
        $userId = Auth::id();
        $items = $this->filterService->filterByChosenCategories($request->categories, $request->sort, $userId);

        $categories = $this->categoryService->getAll();
        return view('pages.home', ['items' => $items, 'userCategories' => $request->categories, 'categories' => $categories, 'selectedSort' => $request->sort ]);
    }
}
