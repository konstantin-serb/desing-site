<?php


namespace app\components;


abstract class AdminBase
{
    public static function isAdmin($user)
    {
        if (!empty($user)) {
            if ($user->admin_status == 1) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

}