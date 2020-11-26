<?php


class Session
{
    public static function isAdmin()
    {
        if (!isset($_SESSION['userIsAdmin']) || !$_SESSION['userIsAdmin']) {
            return false;
        }
        return true;
    }

    public static function isLogin()
    {
        if (!isset($_SESSION['userId']) || !$_SESSION['userId']) {
            return false;
        }
        return true;
    }

}