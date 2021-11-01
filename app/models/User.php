<?php

namespace App\Models;

use Core\Model\Model;

class User extends Model
{


    protected string $table = 'users';

    protected array $props = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'status'
    ];

    public function save()
    {
        $this->updateDataProp('password', password_hash($this->getDataProp('password'), PASSWORD_DEFAULT));
        parent::save();
    }
}
