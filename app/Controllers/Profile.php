<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index(): string
    {
        $user = (new UserModel())->first();

        return view('partials/header', ['title' => 'Profile'])
            . view('profile/index', ['user' => $user])
            . view('partials/footer');
    }
}
