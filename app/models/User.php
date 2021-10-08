<?php

namespace App\Model;

class User
{
    protected $table = 'users';

    protected $props = array(
        'first_name',
        'last_name',
        'email',
        'password',
    );
}
