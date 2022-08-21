<?php

if (!function_exists('get_value_enums')) {
    /**
     * Get value from enums file.
     *
     * @param  array $data
     * @return array
     */
    function get_value_enums(array $data) {
        $values = [];

        foreach ($data as $value) {
            $values[] = $value->value;
        }

        return $values;
    }
}
