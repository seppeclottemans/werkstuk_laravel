<?php

namespace App\Http\Services;

use App\Notifications\RentRequestNotification;
use App\User;
use App\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class RentNotificationService
{
    public function get($notificationId){
        $notificationData = DB::table('notifications')->where('id', $notificationId)->first();
        return $notificationData;
    }

    public function create($request, int $itemId, Item $itemToRent, User $user){
        $details = [
            'itemId' => $itemId,
            'title' => $user->name . ' would like to rent ' . $itemToRent->title,
            'body' => $request->message,
            'renterId' => $user->id,
            'amount' => $request->rent_amount,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo,
        ];

        // send rent notification to item owner
        $itemOwner = $itemToRent->user;
        Notification::send($itemOwner, new RentRequestNotification($details));
    }

    public function delete($notificationId, User $user){
        $user->notifications()->where('id', $notificationId)->delete();
    }
}
