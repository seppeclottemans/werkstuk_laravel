<?php

namespace App\Http\Controllers;

use App\Http\Services\ItemService;
use App\Http\Services\RentNotificationService;
use App\Http\Services\RentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RentController extends Controller
{

    // services
    private $itemService;
    private $rentNotificationService;
    private $rentService;

    public function __construct(ItemService $itemService, RentNotificationService $rentNotificationService, RentService $rentService)
    {
        $this->itemService = $itemService;
        $this->rentNotificationService = $rentNotificationService;
        $this->rentService = $rentService;
    }

    // accept rent request
    public function acceptRentRequest($notificationId){
        $user = Auth::user();
        $notification = $this->rentNotificationService->get($notificationId);
        if (Gate::allows('rent-request', [$notification])) {
            $this->rentService->acceptRentRequest($notification, $user);
            return redirect()->route('home-page');
        }else{
            return view('pages.unauthorized');
        }
    }

    public function itemReturned($rentId){
        $ongoingRent = $this->rentService->get($rentId);

        if (Gate::allows('delete-rent', [$ongoingRent])) {
            $this->rentService->delete($ongoingRent);
            return redirect()->route('ongoing-rentals-page');
        }else{
            return view('pages.unauthorized');
        }
    }

}

