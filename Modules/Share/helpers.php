<?php

if (! function_exists('get_value_enums')) {
    /**
     * Get value from enums file.
     *
     *
     * @return array
     */
    function get_value_enums(array $data)
    {
        $values = [];

        foreach ($data as $value) {
            $values[] = $value->value;
        }

        return $values;
    }
}

if (! function_exists('startWith')) {
    /**
     * Check start with character.
     *
     *
     * @return bool
     */
    function startWith(string $string, string $startString)
    {
        return str_starts_with($string, $startString);
    }
}
