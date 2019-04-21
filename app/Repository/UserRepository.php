<?php

use Models\User;

class UserRepository
{

    public static function getUserByEmail($email)
    {
        return (new User())->where('email', $email)->first();
    }
}
