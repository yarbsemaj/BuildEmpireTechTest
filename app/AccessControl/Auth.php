<?php


namespace AccessControl;


use Models\User;

class Auth
{
    private static $loggedInUser;

    /**
     * Is no user logged in
     * @return bool
     */
    public static function guest()
    {
        return !isset($_SESSION['user_id']);
    }

    /**
     * Return the id of the current logged in user, else return false
     * @return bool|int
     */
    public static function id()
    {
        return self::auth() ? $_SESSION['user_id'] : false;
    }

    /**
     * Is this user logged in
     * @return bool
     */
    public static function auth()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Return the currently logged in user
     * @return bool|User
     */
    public static function user()
    {
        if (self::auth()) {
            return isset(self::$loggedInUser) ? self::$loggedInUser : self::getUser();
        }
        return false;
    }

    private static function getUser()
    {
        self::$loggedInUser = isset(self::$loggedInUser) ? self::$loggedInUser :
            (new User())->find($_SESSION['user_id']);
        return self::$loggedInUser;

    }

    /**
     * Authorise the user after login
     * @param User $user
     */
    public static function authorise(User $user)
    {
        $pKey = $user->primaryKey;
        $_SESSION['user_id'] = $user->$pKey;
    }

    /**
     *Loges out the current user
     */
    public static function deauthorise()
    {
        unset($_SESSION['user_id']);
    }

}