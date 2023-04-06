<?php

namespace Modules\Share\Services;

use Modules\Media\Services\MediaFileService;

class ShareService
{
    /**
     * Show success toast.
     *
     * @param string $title
     *
     * @return mixed
     */
    public static function successToast(string $title)
    {
        return toast($title, 'success')->autoClose(5000);
    }

    /**
     * Show error toast.
     *
     * @param string $title
     *
     * @return mixed
     */
    public static function errorToast(string $title)
    {
        return toast($title, 'error')->autoClose(5000);
    }

    /**
     * Convert string to slug.
     *
     * @param string $title
     *
     * @return string
     */
    public static function makeSlug(string $title)
    {
        return preg_replace('/\s+/', '-', str_replace('_', '', $title));
    }

    /**
     * Make unique sku.
     *
     * @param $model
     *
     * @throws \Exception
     *
     * @return string
     */
    public static function makeUniqueSku($model)
    {
        $number = random_int(10000, 99999);

        if ((new self())->checkSKU($model, $number)) {
            return self::makeUniqueSku($model);
        }

        return (string) $number;
    }

    /**
     * Check sku is exists.
     *
     * @param     $model
     * @param int $number
     *
     * @return bool
     */
    private function checkSKU($model, int $number)
    {
        return $model::query()->where('sku', $number)->exists();
    }

    /**
     * Upload media with add in request.
     *
     * @param        $request
     * @param string $file
     * @param string $field
     *
     * @return mixed
     */
    public static function uploadMediaWithAddInRequest($request, string $file = 'image', string $field = 'media_id')
    {
        return $request->request->add([$field => MediaFileService::publicUpload($request->file($file))->id]);
    }

    /**
     * Convert text to read minute.
     *
     * @param string $text
     *
     * @return float
     */
    public static function convertTextToReadMinute(string $text)
    {
        return ceil(str_word_count(strip_tags($text)) / 250);
    }
}
