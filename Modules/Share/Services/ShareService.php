<?php

namespace Modules\Share\Services;

class ShareService
{
    public static function successToast($title)
    {
        return toast($title,'success')->autoClose(5000);
    }

    public static function errorToast($title)
    {
        return toast($title,'error')->autoClose(5000);
    }
}
