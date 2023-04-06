<?php

namespace Modules\Auth\Services;

class ResetPasswordService
{
    /**
     * Update password.
     *
     * @param            $user
     * @param string|int $newPassword
     *
     * @return void
     */
    public static function changePassword($user, string|int $newPassword)
    {
        $user->password = bcrypt($newPassword);
        $user->save();
    }
}
