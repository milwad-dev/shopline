<?php

namespace Modules\Auth\Services;

class ResetPasswordService
{
    public static function changePassword($user, $newPassword)
    {
        $user->password = bcrypt($newPassword);
        $user->save();
    }
}
