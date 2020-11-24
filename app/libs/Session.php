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

}