<?php

namespace App\Http\Services;

use App\Image;
use App\Item;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class ImageService
{
    public function getMultipleById($ids)
    {
        return Image::findMany($ids);
    }

    public function delete(Collection $images, Item $item)
    {
        foreach ($images as $image) {
            $imageID = $image->id;
            $image_link = $image->image_link;

            File::delete($image_link);
            DB::table('item_images')->where('id', $imageID)->delete();
        }

    }

    public function create($images, Item $item){
        collect($images)->each(function (UploadedFile $image) use ($item) {
            $storedImage = Storage::disk('public')->put('', $image);
            $image = new Image([
                'image_link' => 'storage/' . $storedImage
            ]);
            $image->item()->associate($item->id);
            $image->save();
        });
    }

    public function setUserProfileImage($image, User $user){
        $storedImage = Storage::disk('public')->put('', $image);
        $user->update([
            'image_link' => 'storage/' . $storedImage
        ]);
    }

    public function removeOldProfileImage(User $user){
        $image_link = $user->image_link;
        File::delete($image_link);
    }
}
