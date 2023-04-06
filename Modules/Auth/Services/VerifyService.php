<?php

namespace Modules\Auth\Services;

class VerifyService
{
    private static int $min = 100000;
    private static int $max = 999999;
    private static string $prefix = 'verify_code_';

    /**
     * Generate code.
     *
     * @throws \Exception
     *
     * @return int
     */
    public static function generate()
    {
        return random_int(self::$min, self::$max);
    }

    /**
     * Store code in cache.
     *
     * @param $id
     * @param $code
     * @param $time
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return void
     */
    public static function store($id, $code, $time)
    {
        cache()->set(self::$prefix.$id, $code, $time);
    }

    /**
     * Get code from cache.
     *
     * @param $id
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     * @return \Illuminate\Contracts\Cache\Repository|mixed
     */
    public static function get($id)
    {
        return cache()->get(self::$prefix.$id);
    }

    /**
     * Check cache has code with id.
     *
     * @param $id
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return bool
     */
    public static function has($id)
    {
        return cache()->has(self::$prefix.$id);
    }

    /**
     * Delete code from cache.
     *
     * @param $id
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return bool
     */
    public static function delete($id)
    {
        return cache()->delete(self::$prefix.$id);
    }

    /**
     * Get rule for code.
     *
     * @return string
     */
    public static function getRule()
    {
        return 'required|numeric|between:'.self::$min.','.self::$max;
    }

    /**
     * Check code is true.
     *
     * @param $id
     * @param $code
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return bool
     */
    public static function check($id, $code)
    {
        if (self::get($id) != $code) {
            return false;
        }

        self::delete($id);

        return true;
    }
}
