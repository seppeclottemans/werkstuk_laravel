<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Http\Services\ItemService;
use App\Http\Services\RentNotificationService;
use App\Item;
use App\Notifications\RentRequestNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewRentMail;

class RentNotificationController extends Controller
{

    // services
    private $itemService;
    private $rentNotificationService;

    public function __construct(ItemService $itemService, RentNotificationService $rentNotificationService)
    {
        $this->itemService = $itemService;
        $this->rentNotificationService = $rentNotificationService;
    }

    public function getRentItemPage($itemId){
        $item = $this->itemService->get($itemId);
        return view('pages.rent-item', ['item' => $item]);
    }

    public function getNotificationInfo($notificationId){
        $notification = $this->rentNotificationService->get($notificationId);
        if (Gate::allows('rent-request', [$notification])) {
            $notificationData = json_decode($notification->data);
            return view('pages.notification-info', ['notificationData' => $notificationData, 'notificationId' => $notificationId]);
        }else{
            return view('pages.unauthorized');
        }
    }

    // sent rent item request
    public function sentRentItemRequest(RentRequest $request, int $itemId){
        $user = Auth::user();
        $itemToRent = $this->itemService->get($itemId);
        $this->rentNotificationService->create($request, $itemId, $itemToRent, $user);
        return redirect()->route('home-page');
    }

    public function deleteNotification($notificationId){
        $user = Auth::user();
        $this->rentNotificationService->delete($notificationId, $user);
        return redirect()->route('home-page');
    }
}
