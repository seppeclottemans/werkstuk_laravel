<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;
    private $userService;


    public function __construct(AdminService $adminService, UserService $userService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
    }

    public function getAllUsersPage(){
        $users = $this->adminService->getAllUsers();
        return view('admin.pages.users', ['users' => $users]);
    }

    public function searchUser(Request $request){
        $users = $this->adminService->searchUserByName($request->userName);
        return view('admin.pages.users', ['users' => $users]);
    }

    public function makeAdmin($userId){
        $user = $this->userService->get($userId);
        $this->adminService->makeAdmin($user);
        return redirect()->back();
    }

    public function deleteUser($userId){
        $user = $this->userService->get($userId);
        $this->adminService->deleteUser($user);

        return redirect()->back();
    }
}
