<?php

namespace App\Controllers;

use App\Models\SuperUsers;

class CSuperUsers
{
    public static function authentification($email, $password)
    {
        return SuperUsers::Where([
            ['email', $email], ['password', $password]
            ])->exists();
    }
}
