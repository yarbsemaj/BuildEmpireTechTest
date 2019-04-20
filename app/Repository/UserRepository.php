<?php

use Models\User;

class UserRepository
{

    public function getUserByEmail($email)
    {
        return (new User())->where('email', 'yarbsemaj@gmail.com')->get();
    }
}
