<?php

namespace App\Http\Services;

use App\User;

class ProfileService
{
    public function update(string $newUserName, User $user){
        $user->update(
            ['name' => $newUserName]
        );
        return $user;
    }
}
