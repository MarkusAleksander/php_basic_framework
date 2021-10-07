<?php

namespace App\Test;

use App\Test\UserModel;

class User
{
    private $user;

    public function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function userModel()
    {
        return $this->user;
    }
}
