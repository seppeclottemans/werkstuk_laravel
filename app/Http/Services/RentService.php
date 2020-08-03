<?php

namespace App\Http\Services;


use App\Item;
use App\OngoingRent;
use App\User;

class RentService
{

    // services
    private $itemService;
    private $rentNotificationService;

    public function __construct(ItemService $itemService, RentNotificationService $rentNotificationService)
    {
        $this->itemService = $itemService;
        $this->rentNotificationService = $rentNotificationService;
    }

    public function get(int $id){
        return OngoingRent::where('id', $id)->first();
    }

    public function create($notification, User $user){
        $rentRequest = json_decode($notification->data);
        $ongoingRent = new OngoingRent([
            'owner_id' => $user->id,
            'amount' => $rentRequest->amount,
            'date_from' => $rentRequest->dateFrom,
            'date_to' => $rentRequest->dateTo
        ]);

        $ongoingRent->user()->associate($rentRequest->renterId);
        $ongoingRent->item()->associate($rentRequest->itemId);
        $ongoingRent->save();


        return $ongoingRent;
    }

    public function delete(OngoingRent $ongoingRent){
        $item = $ongoingRent->item;
        $item->current_amount = $item->current_amount + $ongoingRent->amount;
        $ongoingRent->delete();
        $item->save();
    }

    public function acceptRentRequest($notification, User $user)
    {
        $rentRequest = json_decode($notification->data);
        $item = $this->itemService->get($rentRequest->itemId);
        if ($item->current_amount >= $rentRequest->amount) {
            $item->current_amount = $item->current_amount - $rentRequest->amount;
            $item->save();
            $this->create($notification, $user);
        }
        $this->rentNotificationService->delete($notification->id, $user);
    }
}
