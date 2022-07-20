<?php

namespace Modules\Share\Services;

class ShareService
{
    public static function successToast($title)
    {
        return toast($title,'success')->autoClose(5000);
    }
}
