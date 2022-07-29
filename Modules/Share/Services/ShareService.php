<?php

namespace Modules\Share\Services;

class ShareService
{
    /**
     * Show success toast.
     *
     * @param $title
     * @return mixed
     */
    public static function successToast($title)
    {
        return toast($title,'success')->autoClose(5000);
    }

    /**
     * Show error toast.
     *
     * @param $title
     * @return mixed
     */
    public static function errorToast($title)
    {
        return toast($title,'error')->autoClose(5000);
    }

    /**
     * Convert string to slug.
     *
     * @param string $title
     * @return string
     */
    public static function makeSlug(string $title)
    {
        return preg_replace('/\s+/', '-', str_replace('_', '', $title));
    }
}
